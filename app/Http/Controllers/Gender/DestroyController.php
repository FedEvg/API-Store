<?php

namespace App\Http\Controllers\Gender;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenderResource;
use App\Models\Gender;

class DestroyController extends Controller
{
    public function __invoke(Gender $gender)
    {
        $gender->delete();

        return new GenderResource($gender);
    }
}
