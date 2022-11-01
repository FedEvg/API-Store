<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Http\Resources\ColorResource;
use App\Models\Color;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $color = Color::query()->firstOrCreate($data);

        return $color instanceof Color ? new ColorResource($color) : $color;
    }
}
