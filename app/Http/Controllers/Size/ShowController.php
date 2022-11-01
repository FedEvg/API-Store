<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Resources\SizeResource;
use App\Models\Size;

class ShowController extends Controller
{
    public function __invoke(Size $size)
    {
        return new SizeResource($size);
    }
}
