<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CatSize extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cat_sizes';

    protected $fillable = [
        'name',
    ];

    public function sizes()
    {
        return $this->hasMany(Size::class, 'cat_size_id', 'id');
    }

    public function clothes()
    {
        return $this->hasMany(Clothing::class, 'cat_size_id', 'id');
    }
}
