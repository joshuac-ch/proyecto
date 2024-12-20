<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Google\Service\Gmail;
use Google\Client as GoogleClient;

class ReunionImportanteNotificacion extends Notification
{
    use Queueable;

    private $detalleReunión;

    public function __construct($detalleReunión)
    {
        $this->detalleReunión = $detalleReunión;
    }

    // Notificación vía correo electrónico
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nueva reunión importante agendada')
            ->line('Se ha agendado una nueva reunión importante.')
            ->line('Detalles de la reunión: ' . $this->detalleReunión)
            ->action('Ver reunión', url('/reunion'))
            ->line('Gracias por usar nuestro sistema!');
    }

    // Notificación vía base de datos
    public function toDatabase($notifiable)
    {
        return [
            'mensaje' => 'Se ha agendado una reunión importante',
            'detalle' => $this->detalleReunión,
            'url' => url('/reuniones')
        ];
    }
}
