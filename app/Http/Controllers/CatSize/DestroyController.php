<?php

namespace App\Http\Controllers\CatSize;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatSizeResource;
use App\Models\CatSize;

class DestroyController extends Controller
{
    public function __invoke(CatSize $catSize)
    {
        $catSize->delete();

        return new CatSizeResource($catSize);
    }
}
