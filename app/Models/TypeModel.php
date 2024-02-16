<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'type';

    public function products()
    {
        return $this->hasMany(ProductModel::class, 'type_id');
    }
}
