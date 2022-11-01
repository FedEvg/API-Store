<?php

namespace App\Http\Controllers\Gender;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenderResource;
use App\Models\Gender;

class IndexController extends Controller
{
    public function __invoke()
    {
        $genders = Gender::query()->orderByDesc('created_at')->paginate(10);

        return GenderResource::collection($genders);
    }
}
