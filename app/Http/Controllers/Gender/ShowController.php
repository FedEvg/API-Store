<?php

namespace App\Http\Controllers\Gender;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenderResource;
use App\Models\Gender;

class ShowController extends Controller
{
    public function __invoke(Gender $gender)
    {
        return new GenderResource($gender);
    }
}
