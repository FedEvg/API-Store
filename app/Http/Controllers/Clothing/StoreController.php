<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clothing\StoreRequest;
use App\Http\Resources\ClothingResource;
use App\Models\Brand;
use App\Models\CatSize;
use App\Models\Clothing;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $clothing = $this->service->store($data);

        return $clothing instanceof Clothing ? new ClothingResource($clothing) : $clothing;
    }
}
