<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Size\UpdateRequest;
use App\Http\Resources\SizeResource;
use App\Models\Size;
use App\Models\CatSize;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Size $size)
    {
        $data = $request->validated();

        $data['cat_size_id'] = $this->getCatSizeIdWithUpdate($data['catSize']);
        unset($data['catSize']);

        $size = $size->update($data);

        return $size instanceof Size ? new SizeResource($size) : $size;
    }

    private function getCatSizeIdWithUpdate($item)
    {
        if (!isset($item['id'])){
            $catSize = CatSize::query()->create($item);
        } else {
            $catSize = CatSize::query()->find($item['id']);
            $catSize->update($item);
            $catSize = $catSize->fresh();
        }
        return $catSize->id;
    }
}
