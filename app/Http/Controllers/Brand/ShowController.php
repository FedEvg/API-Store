<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class ShowController extends Controller
{
    public function __invoke(Brand $brand)
    {
        return new BrandResource($brand);
    }
}
