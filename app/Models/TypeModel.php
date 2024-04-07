<?php

namespace App\Models;

use App\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'types';


}
