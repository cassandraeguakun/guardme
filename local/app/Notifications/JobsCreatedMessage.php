<?php
namespace Responsive\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class JobsCreatedMessage extends Notification
{
    use Queueable;
    
    private $userId;
    private $userName;
    private $email;
    private $specificAreaMin;
    private $specificAreaMax;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userId, $userName, $email, $specificAreaMin, $specificAreaMax)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->email = $email;
        $this->specificAreaMin = $specificAreaMin;
        $this->specificAreaMax = $specificAreaMax;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->subject('Job created in your area')
            ->markdown('mail.jobpost', ['specificAreaMax' => $this->specificAreaMax, 'userName' => $this->userName]);
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
            //
        ];
    }
}