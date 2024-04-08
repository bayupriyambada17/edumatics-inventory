<?php

namespace App\Livewire\Pages\Admin;

use App\Models\ProductModel;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Product extends Component
{
    public $name_product, $code_product;
    public $productId;
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
            'name_product' => 'required|min:1|max:255',
            'code_product' => 'required|integer'
        ]);
        if ($this->productId) {
            $type = ProductModel::find($this->productId);
            $type->update([
                'name_product' => $this->name_product,
                'code_product' => $this->code_product
            ]);
            $this->notification('success', 'Successfully Update Data');
        } else {
            ProductModel::create([
                'name_product' => $this->name_product, 'code_product' => $this->code_product

            ]);
            $this->notification('success', 'Successfully Create Data');
        }
        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $type = ProductModel::find($id);
        $this->productId = $type->id;
        $this->name_product = $type->name_product;
        $this->code_product = $type->code_product;
        $this->openModal();
    }

    public function resetFields()
    {
        $this->productId = null;
        $this->name_product = '';
        $this->code_product = '';
    }

    public function destroy($id)
    {
        ProductModel::destroy($id);
        $this->notification('success', 'Successfully Delete Data');
    }
    public function render()
    {
        $products = ProductModel::where('name_product', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        return view('livewire.pages.admin.Product', compact('products'));
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
