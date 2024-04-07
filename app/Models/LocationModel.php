<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocationModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'locations';

}
