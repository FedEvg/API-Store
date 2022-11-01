<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        $data['phoneNumber'] = $this->checkPhoneNumber($data['phoneNumber']);

        $user = User::query()->firstOrCreate($data);

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
