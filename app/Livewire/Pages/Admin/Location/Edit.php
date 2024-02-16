<?php

namespace App\Livewire\Pages\Admin\Location;

use App\Models\LocationModel;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $id;
    public $title;

    public function mount($id)
    {
        $location = LocationModel::find($id);
        $this->id = $location->id;
        $this->name = $location->name;
        $this->title = 'Edit Location: ' . $location->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1|max:255'
        ]);
        $location = LocationModel::find($this->id);
        $location->update([
            'name' => $this->name
        ]);
        session()->flash('success', 'Location ' . $this->name . ' updated successfully');
        return redirect()->route('location.index');
    }
    public function render()
    {
        return view('livewire.pages.admin.location.edit')->layout('template.admin.main');
    }
}
