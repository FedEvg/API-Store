<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Resources\SizeResource;
use App\Models\Size;

class DestroyController extends Controller
{
    public function __invoke(Size $size)
    {
        $size->delete();

        return new SizeResource($size);
    }
}
