<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class DestroyController extends Controller
{
    public function __invoke(Brand $brand)
    {
        $brand->delete();

        return new BrandResource($brand);
    }
}
