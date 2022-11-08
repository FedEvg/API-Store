<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class DestroyController extends BaseController
{
    public function __invoke(User $user)
    {
        $user->delete();

        return new UserResource($user);
    }
}
