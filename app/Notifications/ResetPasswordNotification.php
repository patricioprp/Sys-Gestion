<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

/*        return (new MailMessage)
            ->subject(Lang::getFromJson('Reset Password Notification'))
            ->line(Lang::getFromJson('Recibes este mail porque solicitaste un reestablecimiento de tu cuenta.'))
            ->action(Lang::getFromJson('Resetear Contraseña'), url(config('app.url').route('password.reset', $this->token, false)))
            ->line(Lang::getFromJson('Si no realizaste esta petición puedes ingnorar este correo.'));*/
        return (new MailMessage)
            ->greeting('Hola  '.$notifiable->name)
            ->subject('Notifición de Restablecimiento de Contraseña')
            ->line('Recibes este mail porque solicitaste un reestablecimiento de tu cuenta.')
            ->action('Resetear Contraseña', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Si no realizaste esta petición puedes ingnorar este correo.')
            ->salutation('Saludos');

    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
