<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sizes';

    protected $fillable = [
        'name',
        'cat_size_id',
    ];

    public function catSize()
    {
        return $this->belongsTo(CatSize::class, 'cat_size_id', 'id');
    }
}
