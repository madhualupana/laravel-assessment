<?php

namespace App\Services;

use App\Models\User;
use App\Models\Detail;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function saveUserDetails(User $user)
    {
        try {
            $this->saveDetail($user, 'Full name', $user->fullName);
            $this->saveDetail($user, 'Middle initial', $user->middleInitial);
            $this->saveDetail($user, 'Avatar', $user->avatar);
            $this->saveDetail($user, 'Gender', $user->prefixname);
            
            Log::info("Successfully saved details for user: {$user->id}");
            return true;
        } catch (\Exception $e) {
            Log::error("Failed to save user details: {$e->getMessage()}");
            return false;
        }
    }

    protected function saveDetail(User $user, $key, $value)
    {
        return $user->details()->updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'status' => '1',
                'type' => 'detail'
            ]
        );
    }
}