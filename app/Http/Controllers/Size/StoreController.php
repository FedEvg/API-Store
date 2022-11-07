<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\StoreRequest;
use App\Http\Resources\SizeResource;
use App\Models\Size;
use App\Models\CatSize;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['cat_size_id'] = $this->getCatSizeId($data['catSize']);
        unset($data['catSize']);

        $size = Size::query()->firstOrCreate($data);

        return $size instanceof Size ? new SizeResource($size) : $size;
    }

    private function getCatSizeId($item)
    {
        $catSize = !isset($item['id']) ? CatSize::query()->firstOrCreate($item) : CatSize::query()->find($item['id']);

        return $catSize->id;
    }
}
