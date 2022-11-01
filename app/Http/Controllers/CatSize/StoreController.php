<?php

namespace App\Http\Controllers\CatSize;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatSize\StoreRequest;
use App\Http\Resources\CatSizeResource;
use App\Models\CatSize;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $catSize = CatSize::query()->firstOrCreate($data);

        return $catSize instanceof CatSize ? new CatSizeResource($catSize) : $catSize;
    }
}
