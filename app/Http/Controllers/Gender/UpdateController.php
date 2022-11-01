<?php

namespace App\Http\Controllers\Gender;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gender\UpdateRequest;
use App\Http\Resources\GenderResource;
use App\Models\Gender;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Gender $gender)
    {
        $data = $request->validated();

        $gender = $gender->update($data);

        return $gender instanceof Gender ? new GenderResource($gender) : $gender;
    }
}
