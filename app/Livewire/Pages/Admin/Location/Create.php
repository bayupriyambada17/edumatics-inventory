<?php

namespace App\Livewire\Pages\Admin\Location;

use App\Models\LocationModel;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public function store()
    {
        $this->validate([
            'name' => 'required|min:1|max:255'
        ]);
        LocationModel::create([
            'name' => $this->name
        ]);
        session()->flash('success', 'Location ' . $this->name . ' created successfully');
        return redirect()->route('location.index');
    }
    public function render()
    {
        return view('livewire.pages.admin.location.create')->layout('template.admin.main');
    }
}
