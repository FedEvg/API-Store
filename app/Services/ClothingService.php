<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CatSize;
use App\Models\Clothing;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class ClothingService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $data['discount_price'] = $this->discountPrice($data['price'], $data['discount']);
            $data['category_id'] = $this->getCategoryId($data['category']);
            $data['cat_size_id'] = $this->getCatSizeId($data['catSize']);
            $data['brand_id'] = $this->getBrandId($data['brand']);

            $colors = $data['colors'];
            $sizesAndQuantity = $data['sizesAndQuantity'];
            unset($data['category'], $data['catSize'], $data['brand'], $data['colors'], $data['sizesAndQuantity']);

            $colorIds  = $this->getColorIds($colors);
            $sizeAndQuantityIds  = $this->getSizeAndQuantityIds($sizesAndQuantity);

            $clothing = Clothing::firstOrCreate($data);

            $clothing->colors()->attach($colorIds);
            $clothing->sizesAndQuantity()->attach($sizeAndQuantityIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $clothing;
    }

    public function update($clothing, $data)
    {
        try {
            DB::beginTransaction();
            $data['discount_price'] = $this->discountPrice($data['price'], $data['discount']);
            $data['category_id'] = $this->getCategoryIdWithUpdate($data['category']);
            $data['cat_size_id'] = $this->getCatSizeIdWithUpdate($data['catSize']);
            $data['brand_id'] = $this->getBrandIdWithUpdate($data['brand']);

            $colors = $data['colors'];
            $sizesAndQuantity = $data['sizesAndQuantity'];
            unset($data['category'], $data['catSize'], $data['brand'], $data['colors'], $data['sizesAndQuantity']);

            $colorIds  = $this->getColorIdsWithUpdate($colors);
            $sizeAndQuantityIds  = $this->getSizeAndQuantityIdsWithUpdate($sizesAndQuantity);

            $clothing->update($data);

            $clothing->colors()->sync($colorIds);
            $clothing->sizesAndQuantity()->sync($sizeAndQuantityIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $clothing->fresh();
    }

    private function discountPrice($price, $discount){
        if ($discount !== 0)
        {
            $discountPrice = $price - ($price * ($discount / 100));
            $discountPrice = intval($discountPrice);
        } else {
            $discountPrice = $price;
        }
        return $discountPrice;
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::firstOrCreate($item) : Category::find($item['id']);
        return $category->id;
    }

    private function getCatSizeId($item)
    {
        $catSize = !isset($item['id']) ? CatSize::firstOrCreate($item) : CatSize::find($item['id']);
        return $catSize->id;
    }

    private function getBrandId($item)
    {
        $brand = !isset($item['id']) ? Brand::firstOrCreate($item) : Brand::find($item['id']);
        return $brand->id;
    }

    private function getColorIds($items)
    {
        $colorIds = [];

        foreach ($items as $item)
        {
            $color = !isset($item['id']) ? Color::firstOrCreate($item) : Color::find($item['id']);
            $colorIds[] = $color->id;
        }
        return $colorIds;
    }

    private function getSizeAndQuantityIds($items)
    {
        $getSizeAndQuantityIds = [];

        foreach ($items as $item)
        {
            $sizeAndQuantity = !isset($item['id']) ? Size::firstOrCreate($item) : Size::find($item['id']);
            $getSizeAndQuantityIds[$sizeAndQuantity->id]['quantity'] = $item["quantity"];
        }
        return $getSizeAndQuantityIds;
    }

    private function getCategoryIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
           $category = Category::firstOrCreate($item);
        } else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }
        return $category->id;
    }

    private function getCatSizeIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
            $catSize = CatSize::firstOrCreate($item);
        } else {
            $catSize = CatSize::find($item['id']);
            $catSize->update($item);
            $catSize = $catSize->fresh();
        }
        return $catSize->id;
    }

    private function getBrandIdWithUpdate($item)
    {
        if (!isset($item['id'])) {
            $brand = Brand::firstOrCreate($item);
        } else {
            $brand = Brand::find($item['id']);
            $brand->update($item);
            $brand = $brand->fresh();
        }
        return $brand->id;
    }

    private function getColorIdsWithUpdate($items)
    {
        $colorIds = [];

        foreach ($items as $item)
        {
            if (!isset($item['id'])) {
               $color = Color::firstOrCreate($item);
            } else {
               $color = Color::find($item['id']);
               $color->update($item);
               $color = $color->fresh();
            }
            $colorIds[] = $color->id;
        }
        return $colorIds;
    }

    private function getSizeAndQuantityIdsWithUpdate($items)
    {
        $getSizeAndQuantityIds = [];

        foreach ($items as $item)
        {
            if (!isset($item['id'])) {
               $sizeAndQuantity = Size::firstOrCreate($item);
            } else {
               $sizeAndQuantity = Size::find($item['id']);
               $sizeAndQuantity->update($item);
               $sizeAndQuantity = $sizeAndQuantity->fresh();
            }
            $getSizeAndQuantityIds[$sizeAndQuantity->id]['quantity'] = $item["quantity"];
        }
        return $getSizeAndQuantityIds;
    }
}
