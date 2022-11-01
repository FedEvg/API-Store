<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\UpdateRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Brand $brand)
    {
        $data = $request->validated();

        $brand = $brand->update($data);

        return $brand instanceof Brand ? new BrandResource($brand) : $brand;
    }
}
