<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brands extends Model
{
    use HasFactory;
    protected $table = 'brands';

    protected $fillable = [
        'name',
        'create_user_id',
        'update_user_id',
    ];

    public function create_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }
    public function update_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }
    public function models(): BelongsToMany
    {
        return $this->belongsToMany(Models::class, 'model_brands', 'brand_id', 'model_id');
    }

}
