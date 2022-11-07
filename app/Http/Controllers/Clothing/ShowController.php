<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClothingResource;
use App\Models\Clothing;

class ShowController extends BaseController
{
    public function __invoke(Clothing $clothing)
    {
        return new ClothingResource($clothing);
    }
}
