<?php

namespace App\Livewire\Pages\Admin\Type;

use Livewire\Component;
use App\Models\TypeModel;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '', $perPage = 10;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {

        $type = TypeModel::find($id);
        if ($type->products->count() > 0) {
            session()->flash('error', 'Type ' . $type->name . ' cannot be deleted because it has products');
            return;
        } else {
            session()->flash('success', 'Type ' . $type->name . ' deleted successfully');
            $type->delete();
        }
    }
    public function render()
    {
        $types = TypeModel::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->withCount('products')
            ->paginate($this->perPage);
        return view('livewire.pages.admin.type.index', [
            'types' => $types
        ])->layout('template.admin.main');
    }
}
