<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clothing extends Model
{
    use HasFactory, SoftDeletes;

//    protected $fillable = [
//        'name',
//        'price',
//        'discount',
//        'status_id',
//        'category_id',
//        'cat_size_id',
//        'brand_id',
//    ];
    protected $guarded = [];

    const STATUS_MISSING = 0;
    const STATUS_AVAILABLE = 1;

    public static function getStatus()
    {
        return [
            self::STATUS_MISSING => 'Missing',
            self::STATUS_AVAILABLE => 'Available',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'clothing_colors', 'clothing_id','color_id');
    }

    public function sizesAndQuantity()
    {
        return $this->belongsToMany(Size::class, 'clothing_size_quantities', 'clothing_id', 'size_id');
    }

    public function fullName()
    {
        return $this->category->name." ".$this->brand->name." ".$this->name;
    }
}
