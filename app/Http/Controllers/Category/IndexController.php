<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::query()->orderByDesc('created_at')->paginate(10);

        return CategoryResource::collection($categories);
    }
}
