<?php

namespace App\Livewire\Pages\Admin\Supplier;

use App\Models\LocationModel;
use App\Models\SupplierModel;
use App\Models\TypeModel;
use Livewire\Component;

class Create extends Component
{
    public $name, $name_pt, $phone, $email, $address;
    public function store()
    {
        $this->validate([
            'name' => 'required|min:1|max:255',
            'name_pt' => 'required',
            'phone' => 'required|min:10|max:15',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        SupplierModel::create([
            'name' => $this->name,
            'name_pt' => $this->name_pt,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
        ]);
        session()->flash('success', 'Supplier ' . $this->name . ' created successfully');
        return redirect()->route('supplier.index');
    }
    public function render()
    {

        return view('livewire.pages.admin.supplier.create',)->layout('template.admin.main');
    }
}
