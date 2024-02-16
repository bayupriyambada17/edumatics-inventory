<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocationModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'location';

    public function products()
    {
        return $this->hasMany(ProductModel::class, 'location_id');
    }
}
