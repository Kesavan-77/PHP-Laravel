<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserFollowNotification extends Notification
{
    use Queueable;
    
    public $userName;
    public $message;
    public $userId;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userId, $userName,$message)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->message = $message;
        $this->user = User::find($this->userId);

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->view('mails.user-notification-template', ['user' => $this->user]);
    }

   /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id'=>$this->userId,
            'name'=>$this->userName,
            'message'=>$this->message,
        ];
    }
}
