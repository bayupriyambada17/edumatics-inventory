<?php

namespace App\Livewire\Pages\Admin;

use App\Models\LocationModel;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Location extends Component
{
    public $location;
    public $locationId;

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
            'location' => 'required|min:1|max:255'
        ]);
        if ($this->locationId) {
            $type = LocationModel::find($this->locationId);
            $type->update([
                'location' => $this->location
            ]);
            $this->notification('success', 'Successfully Update Data');
        } else {
            LocationModel::create([
                'location' => $this->location
            ]);
            $this->notification('success', 'Successfully Create Data');
        }
        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $type = LocationModel::find($id);
        $this->locationId = $type->id;
        $this->location = $type->location;
        $this->openModal();
    }

    public function resetFields()
    {
        $this->locationId = null;
        $this->location = '';
    }

    public function destroy($id)
    {
        LocationModel::destroy($id);
        $this->notification('success', 'Successfully Delete Data');
    }
    public function render()
    {
        $locations = LocationModel::where('location', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        return view('livewire.pages.admin.Location', compact('locations'));
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
