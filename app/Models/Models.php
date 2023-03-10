<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Models extends Model
{
    use HasFactory;

    protected $table = 'models';

    protected $fillable = [
        'status_id',
        'create_user_id',
        'update_user_id',
        'update_controll_id',
        'name',
        'active',
    ];

    public function create_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }
    public function update_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_user_id', 'id');
    }

    public function brand(): BelongsToMany
    {
        return $this->belongsToMany(Brands::class, 'model_brands', 'model_id', 'brand_id');
    }
}
