<?php

namespace App\Livewire\Pages\Admin\Type;

use Livewire\Component;
use App\Models\TypeModel;

class Edit extends Component
{
    public $name;
    public $id;
    public $title;

    public function mount($id)
    {
        $type = TypeModel::find($id);
        $this->id = $type->id;
        $this->name = $type->name;
        $this->title = 'Edit Type: ' . $type->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1|max:255'
        ]);
        $type = TypeModel::find($this->id);
        $type->update([
            'name' => $this->name
        ]);
        session()->flash('success', 'Type ' . $this->name . ' updated successfully');
        return redirect()->route('type.index');
    }
    public function render()
    {
        return view('livewire.pages.admin.type.edit')->layout('template.admin.main');
    }
}
