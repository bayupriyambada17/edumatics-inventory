<?php

namespace App\Livewire\Pages\Admin\Supplier;

use Livewire\Component;
use App\Models\SupplierModel;

class Edit extends Component
{
    public $name, $id, $name_pt, $address, $phone, $email;
    public $title;
    public function mount($id)
    {
        $this->id = $id;
        $supplier = SupplierModel::find($id);
        $this->name = $supplier->name;
        $this->name_pt = $supplier->name_pt;
        $this->address = $supplier->address;
        $this->phone = $supplier->phone;
        $this->email = $supplier->email;
        $this->title = 'Edit Supplier: ' . $supplier->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1|max:255',
            'name_pt' => 'required',
            'phone' => 'required|min:10|max:15',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        SupplierModel::find($this->id)->update([
            'name' => $this->name,
            'name_pt' => $this->name_pt,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Supplier ' . $this->name . 'updated successfully');
        return redirect()->route('supplier.index');
    }
    public function render()
    {
        return view('livewire.pages.admin.supplier.edit')->layout('template.admin.main');
    }
}
