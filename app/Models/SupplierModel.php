<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'supplier';

    public function products()
    {
        return $this->hasMany(ProductModel::class, 'supplier_id');
    }
}
