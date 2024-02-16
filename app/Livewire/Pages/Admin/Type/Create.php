<?php

namespace App\Livewire\Pages\Admin\Type;

use Livewire\Component;
use App\Models\TypeModel;

class Create extends Component
{
    public $name;

    public function store()
    {
        $this->validate([
            'name' => 'required|min:1|max:255'
        ]);
        TypeModel::create([
            'name' => $this->name
        ]);
        session()->flash('success', 'Type ' . $this->name . ' created successfully');
        return redirect()->route('type.index');
    }
    public function render()
    {
        return view('livewire.pages.admin.type.create')->layout('template.admin.main');
    }
}
