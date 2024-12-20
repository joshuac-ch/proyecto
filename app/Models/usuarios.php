<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class usuarios extends Model
{
    use Notifiable;
    use HasFactory;
    public function routeNotificationForMail()
    {
        return $this->correo; // Cambia 'correo' por el nombre del campo de correo electrónico
    }
}
