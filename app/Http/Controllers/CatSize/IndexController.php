<?php

namespace App\Http\Controllers\CatSize;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatSizeResource;
use App\Models\CatSize;

class IndexController extends Controller
{
    public function __invoke()
    {
        $catSizes = CatSize::query()->orderByDesc('created_at')->paginate(10);

        return CatSizeResource::collection($catSizes);
    }
}
