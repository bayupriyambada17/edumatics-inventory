<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryInModel extends Model
{
    use HasFactory;
    protected $table = 'inventory_in';
    protected $guarded = ['id'];
}
