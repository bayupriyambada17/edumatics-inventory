<?php

namespace App\Models;

use App\Models\TypeModel;
use App\Models\LocationModel;
use App\Models\SupplierModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'products';

}
