<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        $data['phoneNumber'] = $this->checkPhoneNumber($data['phoneNumber']);

        $user = $user->update($data);

        return $user instanceof User ? new UserResource($user) : $user;
    }

    private function checkPhoneNumber($phoneNumber)
    {
        $pattern = "/^\+380\d{9}$/";

        if (preg_match($pattern, $phoneNumber)) {
            return $phoneNumber;
        } else {
            return 'Error';
        }
    }
}
