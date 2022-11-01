<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Gender;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $data['gender_id'] = $this->getGenderIdWithUpdate($data['gender']);
        unset($data['gender']);

        $category = $category->update($data);

        return $category instanceof Category ? new CategoryResource($category) : $category;
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
