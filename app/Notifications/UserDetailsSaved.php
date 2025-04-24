<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class UserDetailsSaved extends Notification
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('User Details Saved Successfully')
            ->greeting('Hello Administrator!')
            ->line('The following user details were saved:')
            ->line('Full Name: ' . $this->user->fullName)
            ->line('Middle Initial: ' . $this->user->middleInitial)
            ->line('Gender: ' . $this->user->prefixname)
            ->line('Email: ' . $this->user->email)
            ->action('View User', url('/assessment1/'.$this->user->id))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}