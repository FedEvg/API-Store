<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Resources\ColorResource;
use App\Models\Color;

class ShowController extends Controller
{
    public function __invoke(Color $color)
    {
        return new ColorResource($color);
    }
}
