<?php

namespace App\Livewire\Pages\Admin;

use Livewire\Component;
use App\Models\TypeModel;

class DashboardComponent extends Component
{
    public $pageTitle = 'Dashboard';
    public function render()
    {
        $typeAll = TypeModel::count();
        return view('livewire.pages.admin.dashboard-component', [
            'typeAll' => $typeAll
        ]);
    }
}
