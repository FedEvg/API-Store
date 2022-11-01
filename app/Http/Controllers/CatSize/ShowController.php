<?php

namespace App\Http\Controllers\CatSize;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatSizeResource;
use App\Models\CatSize;

class ShowController extends Controller
{
    public function __invoke(CatSize $catSize)
    {
        return new CatSizeResource($catSize);
    }
}
