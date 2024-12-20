<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    use HasFactory;
    public function seguimientos()
    {
        return $this->morphMany(Seguimiento::class, 'cliente');
    }
    public function propietario()
    {
        return $this->belongsTo(usuarios::class, 'asociado_propietario');
    }
    public function contacto()
    {
        return $this->belongsTo(contacto::class, 'asociado_contacto');
    }
    public function parato()
    {
        return $this->belongsTo(contacto::class, 'para');
    }
    public function usuarios()
    {
        return $this->belongsTo(usuarios::class, 'creador');
    }
    public function reuniones()
    {
        return $this->belongsToMany(reuniones::class, 'contacto_reunion');
    }
}
