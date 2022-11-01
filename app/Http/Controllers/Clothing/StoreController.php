<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clothing\StoreRequest;
use App\Http\Resources\ClothingResource;
use App\Models\Brand;
use App\Models\CatSize;
use App\Models\Clothing;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();

            $data['category_id'] = $this->getCategoryId($data['category']);
            $data['cat_size_id'] = $this->getCatSizeId($data['catSize']);
            $data['brand_id'] = $this->getBrandId($data['brand']);

            $colors = $data['colors'];
            $sizesAndQuantity = $data['sizesAndQuantity'];

            unset($data['category'], $data['catSize'], $data['brand'], $data['colors'], $data['sizesAndQuantity']);

            $colorIds  = $this->getColorIds($colors);
            $sizeAndQuantityIds  = $this->getSizesAndQuantityIds($sizesAndQuantity);

            $clothing = Clothing::query()->firstOrCreate($data);

            $clothing->colors()->attach($colorIds);
            $clothing->sizesAndQuantity()->attach($sizeAndQuantityIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $clothing instanceof Clothing ? new ClothingResource($clothing) : $clothing;
    }

    private function getCategoryId($item)
    {
        $category = !isset($item['id']) ? Category::query()->create($item) : Category::query()->find($item['id']);
        return $category->id;
    }

    private function getCatSizeId($item)
    {
        $catSize = !isset($item['id']) ? CatSize::query()->create($item) : CatSize::query()->find($item['id']);
        return $catSize->id;
    }

    private function getBrandId($item)
    {
        $brand = !isset($item['id']) ? Brand::query()->create($item) : Brand::query()->find($item['id']);
        return $brand->id;
    }

    private function getColorIds($items)
    {
        $colorIds = [];

        foreach ($items as $item)
        {
            $color = !isset($item['id']) ? Color::query()->create($item) : Color::query()->find($item['id']);
            $colorIds[] = $color->id;
        }

        return $colorIds;
    }

    private function getSizesAndQuantityIds($items)
    {
        $sizesAndQuantityIds = [];

        foreach ($items as $item)
        {
            $sizeAndQuantity = !isset($item['id']) ? Size::query()->create($item) : Size::query()->find($item['id']);
            $sizesAndQuantityIds['id'] = $sizeAndQuantity->id;
            $sizesAndQuantityIds['quantity'] = $item['quantity'];
        }

        return $sizesAndQuantityIds;
    }

}
