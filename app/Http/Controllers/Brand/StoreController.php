<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $brand = Brand::query()->firstOrCreate($data);

        return $brand instanceof Brand ? new BrandResource($brand) : $brand;
    }
}
