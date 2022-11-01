<?php

namespace App\Http\Controllers\Size;

use App\Http\Controllers\Controller;
use App\Http\Resources\SizeResource;
use App\Models\Size;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sizes = Size::query()->orderByDesc('created_at')->paginate(10);

        return SizeResource::collection($sizes);
    }
}
