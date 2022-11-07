<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClothingResource;
use App\Models\Clothing;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $clothes = Clothing::query()->orderByDesc('created_at')->paginate(10);

        return ClothingResource::collection($clothes);
    }
}
