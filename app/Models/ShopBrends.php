<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopBrends extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'shop_brands';

    protected $fillable = [
        'id',
        'shop_id',
        'brand_id',
    ];

}
