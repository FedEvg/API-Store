<?php

namespace App\Http\Controllers\CatSize;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatSize\UpdateRequest;
use App\Http\Resources\CatSizeResource;
use App\Models\CatSize;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CatSize $catSize)
    {
        $data = $request->validated();

        $catSize = $catSize->update($data);

        return $catSize instanceof CatSize ? new CatSizeResource($catSize) : $catSize;
    }
}
