<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['password'] = Hash::make($data['password']);
            $data['phoneNumber'] = $this->checkPhoneNumber($data['phoneNumber']);

            $user = User::query()->firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $user;
    }

    public function update($user, $data)
    {
        try {
            DB::beginTransaction();

            $data['password'] = Hash::make($data['password']);
            $data['phoneNumber'] = $this->checkPhoneNumber($data['phoneNumber']);

            $user = $user->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $user->fresh();
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
