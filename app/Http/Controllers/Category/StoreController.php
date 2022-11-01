<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Gender;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['gender_id'] = $this->getGenderId($data['gender']);
        unset($data['gender']);

        $category = Category::query()->firstOrCreate($data);

        return $category instanceof Category ? new CategoryResource($category) : $category;
    }

    private function getGenderId($item)
    {
        $gender = !isset($item['id']) ? Gender::query()->create($item) : Gender::query()->find($item['id']);

        return $gender->id;
    }
}
