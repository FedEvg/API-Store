<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class DestroyController extends Controller
{
    public function __invoke(User $gender)
    {
        $gender->delete();

        return new UserResource($gender);
    }
}
