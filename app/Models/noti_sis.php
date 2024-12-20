<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class noti_sis extends Model
{
    protected $fillable = [
        'mensaje',
        'usuario_id',
        'leida',
        'hora',
    ];
    public static function crearNotificacion($mensaje, $user, $hora)
    {
        self::create([
            'usuario_id' => $user,
            'mensaje' => $mensaje,
            'leida' => false,
            'hora' => $hora
        ]);
    }
}
