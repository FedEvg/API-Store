<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clothing\UpdateRequest;
use App\Http\Resources\ClothingResource;
use App\Models\Clothing;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Clothing $clothing)
    {
        $data = $request->validated();

        $this->service->update($clothing, $data);

        return $clothing instanceof Clothing ? new ClothingResource($clothing) : $clothing;
    }
}
