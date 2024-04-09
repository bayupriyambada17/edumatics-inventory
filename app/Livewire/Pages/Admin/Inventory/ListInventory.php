<?php

namespace App\Livewire\Pages\Admin\Inventory;

use App\Helpers\ConstantaHelper;
use App\Helpers\NotificationHelper;
use App\Models\InventoryModel;
use App\Models\LocationModel;
use App\Models\ProductModel;
use App\Models\TypeModel;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ListInventory extends Component
{
    public $product_id, $location_id, $stock, $type_id, $price;
    public $inventoryId;
    public $search = '';
    public $selectProductId = '', $selectTypeId = '', $selectLocationId = '';
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

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
            'product_id' => 'required|min:1|max:255',
            'location_id' => 'required|integer',
            'stock' => 'required|integer',
            'type_id' => 'required|integer',
            'price' => 'required|integer',
        ]);
        $fieldsForm = [
            'product_id' => $this->product_id,
            'location_id' => $this->location_id,
            'stock' => $this->stock,
            'type_id' => $this->type_id,
            'price' => $this->price,
        ];
        try {
            if ($this->inventoryId) {
                $type = InventoryModel::find($this->inventoryId);
                $type->update($fieldsForm);
                NotificationHelper::notification($this, 'success', ConstantaHelper::updated);
            } else {
                InventoryModel::create($fieldsForm);
                NotificationHelper::notification($this, 'success', ConstantaHelper::created);
            }
        } catch (\Throwable $th) {
            NotificationHelper::notification($this, 'error', $th->getMessage());

        }
        $this->resetFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $type = InventoryModel::find($id);
        $this->inventoryId = $type->id;
        $this->product_id = $type->product_id;
        $this->location_id = $type->location_id;
        $this->stock = $type->stock;
        $this->price = $type->price;
        $this->type_id = $type->type_id;
        $this->openModal();
    }

    public function resetFields()
    {
        $this->inventoryId = null;
        $this->product_id = '';
        $this->location_id = '';
        $this->stock = '';
        $this->type_id = '';
        $this->price = '';
    }

    public function destroy($id)
    {
        InventoryModel::destroy($id);
        NotificationHelper::notification($this, 'success', ConstantaHelper::deleted);

    }
    public function render()
    {
        $inventories = InventoryModel::when($this->selectProductId, function ($query) {
            $query->where('product_id', $this->selectProductId);
        })
            ->when($this->selectTypeId, function ($query) {
                $query->where('type_id', $this->selectTypeId);
            })
            ->when($this->selectLocationId, function ($query) {
                $query->where('location_id', $this->selectLocationId);
            })
            ->latest()->paginate(10);
        $products = ProductModel::get();
        $types = TypeModel::get();
        $locations = LocationModel::get();
        return view('livewire.pages.admin.inventory.list-inventory', compact('inventories', 'products', 'types', 'locations'));
    }
}
