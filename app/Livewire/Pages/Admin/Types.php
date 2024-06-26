<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\TypeModel;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Types extends Component
{
    public $name_type;
    public $typesId;

    public $search = '';

    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public function openModal()
    {
        $this->dispatch('openModal');
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
        $this->resetFields();
    }

    public function saveForm()
    {
        $this->validate([
            'name_type' => 'required|min:3|max:255'
        ]);
        if ($this->typesId) {
            $type = TypeModel::find($this->typesId);
            $type->update([
                'name_type' => $this->name_type
            ]);
            $this->notification('success', 'Successfully Update Data');
        } else {
            TypeModel::create([
                'name_type' => $this->name_type
            ]);
            $this->notification('success', 'Successfully Create Data');
        }
        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $type = TypeModel::find($id);
        $this->typesId = $type->id;
        $this->name_type = $type->name_type;
        $this->openModal();
    }

    public function resetFields()
    {
        $this->typesId = null;
        $this->name_type = '';
    }

    public function destroy($id)
    {
        TypeModel::destroy($id);
        $this->notification('success', 'Successfully Delete Data');
    }
    public function render()
    {
        $types = TypeModel::where('name_type', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        return view('livewire.pages.admin.types', compact('types'));
    }

    protected function notification($type, $message)
    {
        $this->alert($type, $message, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
}
