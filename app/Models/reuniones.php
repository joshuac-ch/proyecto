<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reuniones extends Model
{
    //
    use HasFactory;
    public function contactos()
    {
        return $this->belongsToMany(Contacto::class, 'contacto_reunion', 'reuniones_id', 'contacto_id');
    }

    public function usuarios()
    {
        return $this->belongsTo(usuarios::class, 'anfitrion');
    }
}
