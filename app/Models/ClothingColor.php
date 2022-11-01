<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClothingColor extends Model
{
    use HasFactory;

    protected $table = 'clothing_colors';

    protected $fillable = [
        'clothing_id',
        'color_id',
    ];
}
