<?php

namespace App\Livewire\Pages\Admin\Product;

use Livewire\Component;
use App\Models\ProductModel;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '', $perPage = 10;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $supplier = ProductModel::find($id);
        session()->flash('success', 'Product ' . $supplier->name . ' deleted successfully');
        $supplier->delete();
    }
    public function render()
    {
        $products = ProductModel::where('name', 'like', '%' . $this->search . '%')->paginate($this->perPage);
        return view('livewire.pages.admin.product.index', [
            'products' => $products
        ])->layout('template.admin.main');
    }
}
