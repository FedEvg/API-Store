<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\UpdateRequest;
use App\Http\Resources\ColorResource;
use App\Models\Color;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Color $color)
    {
        $data = $request->validated();

        $color = $color->update($data);

        return $color instanceof Color ? new ColorResource($color) : $color;
    }
}
