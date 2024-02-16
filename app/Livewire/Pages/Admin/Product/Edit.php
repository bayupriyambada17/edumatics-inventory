<?php

namespace App\Livewire\Pages\Admin\Product;

use Livewire\Component;
use App\Models\TypeModel;
use App\Models\ProductModel;
use App\Models\LocationModel;
use App\Models\SupplierModel;

class Edit extends Component
{
    public $id, $name, $description, $qty, $price, $type_id, $supplier_id, $location_id, $total_price, $newTotalPrice;


    public $title;
    public function mount($id)
    {
        $product = ProductModel::find($id);
        $this->id = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->qty = $product->qty;
        $this->price = $product->price;
        $this->type_id = $product->type_id;
        $this->supplier_id = $product->supplier_id;
        $this->location_id = $product->location_id;
        $this->total_price = $product->total_price;
        $this->calculateTotalPrice();
        $this->title = 'Edit Product: ' . $product->name;
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

    public function goBack()
    {
        return redirect()->route('products.index');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:1|max:255',
            'description' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'type_id' => 'required',
            'supplier_id' => 'required',
            'location_id' => 'required',
        ]);
        ProductModel::find($this->id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'qty' => $this->qty,
            'price' => $this->price,
            'type_id' => $this->type_id,
            'supplier_id' => $this->supplier_id,
            'location_id' => $this->location_id,
            'total_price' => $this->price * $this->qty,
        ]);
        session()->flash('success', 'Product ' . $this->name . 'updated successfully');
        return redirect()->route('products.index');
    }
    public function render()
    {
        $types = TypeModel::get();
        $suppliers = SupplierModel::get();
        $locations = LocationModel::get();
        return view('livewire.pages.admin.product.edit', [
            'types' => $types,
            'locations' => $locations,
            'suppliers' => $suppliers
        ])->layout('template.admin.main');
    }
}
