<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividades extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'anfitrion',
        'accion',
        'entidad',
        'id_entidad',
        'descripcion',
        'fecha'
    ];
    public function user()
    {
        return $this->belongsTo(usuarios::class, 'anfitrion');
    }
    public static function registrar($userId, $accion, $entidad, $entidadId = null, $descripcion = null, $fecha)
    {
        self::create([
            'anfitrion' => $userId,
            'accion' => $accion,
            'entidad' => $entidad,
            'id_entidad' => $entidadId,
            'descripcion' => $descripcion,
            'fecha' => $fecha
        ]);
    }
}
