<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothingSizeQuantity extends Model
{
    use HasFactory;

    protected $table = 'clothing_color_quantities';

    protected $fillable = [
        'clothing_id',
        'size_id',
        'quantity',
    ];
}
