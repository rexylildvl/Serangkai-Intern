<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyNewEmail extends Notification
{
    use Queueable;

    public $verificationUrl;

    public function __construct($verificationUrl)
    {
        $this->verificationUrl = $verificationUrl;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Verifikasi Email Baru')
            ->line('Silakan klik tombol di bawah untuk memverifikasi alamat email baru Anda.')
            ->action('Verifikasi Email', $this->verificationUrl)
            ->line('Jika Anda tidak meminta perubahan email, abaikan pesan ini.');
    }
}