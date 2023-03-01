<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
