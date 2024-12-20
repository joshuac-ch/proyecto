<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oportunidad extends Model
{
    use HasFactory;
    // Enum para manejar los estados
    const ESTADOS = [
        'nuevo' => 'Nuevo',
        'en_proceso' => 'En Proceso',
        'en_negociacion' => 'En Negociación',
        'ganada' => 'Ganada',
        'perdida' => 'Perdida',
        'en_espera' => 'En Espera',
        'cancelada' => 'Cancelada',
        'reabierta' => 'Reabierta',
    ];
    // Cambiar el estado de la oportunidad
    public function cambiarEstado($nuevoEstado)
    {
        if (in_array($nuevoEstado, array_keys(self::ESTADOS))) {
            $this->estado = $nuevoEstado;
            $this->save();
        } else {
            throw new \Exception("Estado inválido");
        }
    }
    // Métodos para los estados específicos
    public function marcarComoGanada()
    {
        $this->cambiarEstado('ganada');
    }

    public function marcarComoPerdida()
    {
        $this->cambiarEstado('perdida');
    }

    public function marcarComoEnProceso()
    {
        $this->cambiarEstado('en_proceso');
    }

    public function marcarComoEnNegociacion()
    {
        $this->cambiarEstado('en_negociacion');
    }

    public function marcarComoEnEspera()
    {
        $this->cambiarEstado('en_espera');
    }

    public function marcarComoCancelada()
    {
        $this->cambiarEstado('cancelada');
    }

    public function marcarComoReabierta()
    {
        $this->cambiarEstado('reabierta');
    }
    public function contacto()
    {
        return $this->belongsTo(contacto::class, 'cliente_id');
    }
    public function cliente()
    {
        return $this->belongsTo(contacto::class, 'cliente_id');
    }
    public function producto()
    {
        return $this->belongsTo(producto::class, 'producto_id');
    }
    public function vendedor()
    {
        return $this->belongsTo(vendedor::class, 'vendedor_id');
    }
}
