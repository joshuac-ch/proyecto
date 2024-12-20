<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tareas extends Model
{
    use  HasFactory;
    public function usuario()
    {
        return $this->belongsTo(usuarios::class, 'user_id');
    }
    //----------------
    public function propietario()
    {
        return $this->belongsTo(usuarios::class, 'asociado_propietario');
    }
    public function contacto()
    {
        return $this->belongsTo(contacto::class, 'asociado_contacto');
    }
}
