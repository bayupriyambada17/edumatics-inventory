<?php

namespace App\Livewire\Pages\Admin\Location;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LocationModel;

class Index extends Component
{
    use WithPagination;
    public $search = '', $perPage = 10;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $location = LocationModel::find($id);
        if ($location->products->count() > 0) {
            session()->flash('error', 'Location ' . $location->name . ' cannot be deleted because it has products');
            return;
        } else {
            session()->flash('success', 'Location ' . $location->name . ' deleted successfully');
            $location->delete();
        }
    }
    public function render()
    {
        $locations = LocationModel::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->withCount('products')
            ->paginate($this->perPage);
        return view('livewire.pages.admin.location.index', [
            'locations' => $locations
        ])->layout('template.admin.main');
    }
}
