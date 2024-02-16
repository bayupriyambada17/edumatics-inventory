<?php

use App\Livewire\Pages\Admin\DashboardComponent;
use App\Livewire\Pages\Admin\Type\Index as TypeIndex;
use App\Livewire\Pages\Admin\Type\Create as TypeCreate;
use App\Livewire\Pages\Admin\Type\Edit as TypeEdit;

use App\Livewire\Pages\Admin\Location\Index as LocationIndex;
use App\Livewire\Pages\Admin\Location\Create as LocationCreate;
use App\Livewire\Pages\Admin\Location\Edit as LocationEdit;

use App\Livewire\Pages\Admin\Supplier\Index as SupplierIndex;
use App\Livewire\Pages\Admin\Supplier\Create as SupplierCreate;
use App\Livewire\Pages\Admin\Supplier\Edit as SupplierEdit;

use App\Livewire\Pages\Admin\Product\Index as ProductIndex;
use App\Livewire\Pages\Admin\Product\Create as ProductCreate;
use App\Livewire\Pages\Admin\Product\Edit as ProductEdit;
use App\Livewire\Pages\LoginComponent;
use Illuminate\Support\Facades\Route;


Route::get('/', LoginComponent::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::prefix('type')->group(function () {
        Route::get('', TypeIndex::class)->name('type.index');
        Route::get('/create', TypeCreate::class)->name('type.create');
        Route::get('/{id}/update', TypeEdit::class)->name('type.edit');
    });
    Route::prefix('location')->group(function () {
        Route::get('', LocationIndex::class)->name('location.index');
        Route::get('/create', LocationCreate::class)->name('location.create');
        Route::get('/{id}/update', LocationEdit::class)->name('location.edit');
    });
    Route::prefix('supplier')->group(function () {
        Route::get('', SupplierIndex::class)->name('supplier.index');
        Route::get('/create', SupplierCreate::class)->name('supplier.create');
        Route::get('/{id}/update', SupplierEdit::class)->name('supplier.edit');
    });
    Route::prefix('products')->group(function () {
        Route::get('', ProductIndex::class)->name('products.index');
        Route::get('/create', ProductCreate::class)->name(
            'products.create'
        );
        Route::get('/{id}/update', ProductEdit::class)->name('products.edit');
    });
});
