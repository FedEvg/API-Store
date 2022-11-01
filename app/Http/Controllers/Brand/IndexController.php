<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class IndexController extends Controller
{
    public function __invoke()
    {
        $brands = Brand::query()->orderByDesc('created_at')->paginate(10);

        return BrandResource::collection($brands);
    }
}
