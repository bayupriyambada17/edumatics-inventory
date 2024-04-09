<?php

use App\Livewire\Pages\Admin\Types;
use App\Livewire\Pages\Admin\Product;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Admin\Location;
use App\Livewire\Pages\LoginComponent;
use App\Livewire\Pages\Admin\DashboardComponent;
use App\Livewire\Pages\Admin\Inventory\ListInventory;


Route::get('/', LoginComponent::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkAdministrator'])->name('administrator.')->prefix('administrator')->group(function () {
        Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
        Route::get('/types', Types::class)->name('types');
        Route::get('/locations', Location::class)->name('locations');
        Route::get('/products', Product::class)->name('products');
        Route::get('/inventory/list', ListInventory::class)->name('inventoryList');
    });
});
