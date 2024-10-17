<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campanna_recursos extends Model
{
    use HasFactory;
    protected $fillable = [
        'recursoable_id',
        'recursoable_type',
        'campañas_id', // Asegúrate de agregar este campo también si está en la tabla
    ];
    public function recursoable()
    {
        return $this->morphTo();
    }

    public function campaña()
    {
        return $this->belongsTo(campañas::class);
    }
}
