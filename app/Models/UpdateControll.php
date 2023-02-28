<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateControll extends Model
{
    use HasFactory;
    protected $table = 'update_controll';

    protected $fillable = [
        'name',
        'create_user_id',
    ];
}