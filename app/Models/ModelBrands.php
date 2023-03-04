<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBrands extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'model_brands';

    protected $fillable = [
        'id',
        'model_id',
        'brand_id',
    ];
}
