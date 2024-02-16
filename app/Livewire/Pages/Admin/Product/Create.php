<?php

namespace App\Livewire\Pages\Admin\Product;

use Livewire\Component;
use App\Models\TypeModel;
use App\Models\ProductModel;
use App\Models\LocationModel;
use App\Models\SupplierModel;

class Create extends Component
{
    public $name, $description, $qty, $price, $type_id, $supplier_id, $location_id, $total_price;
    public function mount()
    {
        $this->calculateTotalPrice();
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|min:1|max:255',
            'description' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|integer',
            'type_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'location_id' => 'required|integer',
        ]);

        ProductModel::create([
            'name' => $this->name,
            'description' => $this->description,
            'qty' => $this->qty,
            'price' => $this->price,
            'type_id' => (int)$this->type_id,
            'supplier_id' => (int) $this->supplier_id,
            'location_id' => (int) $this->location_id,
            'total_price' => (int) $this->price * $this->qty
        ]);
        session()->flash('success', 'Product ' . $this->name . ' created successfully');
        return redirect()->route('products.index');
    }

    public function updatedQty($value)
    {
        $this->calculateTotalPrice();
    }

    public function updatedPrice($value)
    {
        $this->calculateTotalPrice();
    }

    public function calculateTotalPrice()
    {
        $this->total_price = (int) $this->qty * (int) $this->price;
    }
    public function render()
    {
        $types = TypeModel::get();
        $suppliers = SupplierModel::get();
        $locations = LocationModel::get();
        return view('livewire.pages.admin.product.create', [
            'types' => $types,
            'locations' => $locations,
            'suppliers' => $suppliers
        ])->layout('template.admin.main');
    }
}
