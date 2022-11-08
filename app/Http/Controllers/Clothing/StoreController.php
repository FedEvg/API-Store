<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Requests\Clothing\StoreRequest;
use App\Http\Resources\ClothingResource;
use App\Models\Clothing;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $clothing = $this->service->store($data);

        return $clothing instanceof Clothing ? new ClothingResource($clothing) : $clothing;
    }
}
