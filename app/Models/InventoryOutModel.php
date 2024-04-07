<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOutModel extends Model
{
    use HasFactory;
    protected $table = 'inventory_out';
    protected $guarded = ['id'];
}
