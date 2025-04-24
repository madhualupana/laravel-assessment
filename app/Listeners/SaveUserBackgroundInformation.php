<?php

namespace App\Listeners;

use App\Events\UserSaved;
use App\Services\UserService;
use App\Notifications\UserDetailsSaved;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveUserBackgroundInformation implements ShouldQueue
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function handle(UserSaved $event)
    {
        $this->userService->saveUserDetails($event->user);
        
        $event->user->notify(new UserDetailsSaved($event->user));
        
    }

    
}