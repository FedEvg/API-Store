<?php

namespace App\Http\Controllers\Clothing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clothing\UpdateRequest;
use App\Http\Resources\ClothingResource;
use App\Models\Clothing;
use App\Models\Gender;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Clothing $category)
    {
        $data = $request->validated();

        $data['gender_id'] = $this->getGenderIdWithUpdate($data['gender']);
        unset($data['gender']);

        $category = $category->update($data);

        return $category instanceof Clothing ? new ClothingResource($category) : $category;
    }

    private function getGenderIdWithUpdate($item)
    {
        if (!isset($item['id'])){
            $gender = Gender::query()->create($item);
        } else {
            $gender = Gender::query()->find($item['id']);
            $gender->update($item);
            $gender = $gender->fresh();
        }
        return $gender->id;
    }
}
