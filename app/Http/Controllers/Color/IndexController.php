<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Resources\ColorResource;
use App\Models\Color;

class IndexController extends Controller
{
    public function __invoke()
    {
        $colors = Color::query()->orderByDesc('created_at')->paginate(10);

        return ColorResource::collection($colors);
    }
}
