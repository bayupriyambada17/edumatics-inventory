<?php

namespace App\Livewire\Pages\Admin\Supplier;

use App\Models\SupplierModel;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '', $perPage = 10;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $supplier = SupplierModel::find($id);
        if ($supplier->products->count() > 0) {
            session()->flash('error', 'Supplier ' . $supplier->name . ' cannot be deleted because it has products');
            return;
        } else {
            session()->flash('success', 'Supplier ' . $supplier->name . ' deleted successfully');
            $supplier->delete();
        }
    }
    public function render()
    {
        $suppliers = SupplierModel::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->withCount('products')
            ->paginate($this->perPage);
        return view('livewire.pages.admin.supplier.index', [
            'suppliers' => $suppliers
        ])->layout('template.admin.main');
    }
}
