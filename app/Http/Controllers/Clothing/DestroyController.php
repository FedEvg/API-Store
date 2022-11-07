<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClothingResource;
use App\Models\Clothing;

class DestroyController extends BaseController
{
    public function __invoke(Clothing $clothing)
    {
        $clothing->delete();

        return new ClothingResource($clothing);
    }
}
