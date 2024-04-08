<?php

namespace App\Models;

use App\Models\TypeModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryModel extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(TypeModel::class, 'type_id', 'id');
    }
    public function location()
    {
        return $this->belongsTo(LocationModel::class, 'location_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id', 'id');
    }
}
