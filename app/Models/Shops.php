<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Shops extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = [
        'name',
        'url',
        'create_user_id',
        'update_user_id'
    ];
    public function create_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }
    public function update_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }
    public function brands()
    {
        return $this->hasManyThrough(
            Brands::class,
            ShopBrends::class,
            'shop_id',
            'id',
            'id',
            'brand_id'
        );
    }
}
