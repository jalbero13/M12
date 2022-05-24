<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;

    private string $token;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
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
     * @return MailMessage
     */
    public function toMail( $notifiable ) {
        $link = route("password.reset", ["token" => $this->token]);
        return ( new MailMessage )
            ->greeting("Hola,")
            ->subject( 'Restablir contrasenya')
            ->line( "Rebs aquest correu perquè hem rebut una solicitut de reabastiment de la teva contrasenya")
            ->action( 'Restablir ara', $link)
            ->line( 'Si no has solicitat el reabastiment de la teva contrasenya ignora aquest missatge')
            ->line( 'Aquest enllaç caducarà en 60 minuts');
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
