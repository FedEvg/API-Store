<?php

namespace App\Http\Controllers\Gender;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\StoreRequest;
use App\Http\Resources\GenderResource;
use App\Models\Gender;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $gender = Gender::query()->firstOrCreate($data);

        return $gender instanceof Gender ? new GenderResource($gender) : $gender;
    }
}
