<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class documentos extends Model
{
    //
    public function usuarios()
    {
        return $this->belongsTo(usuarios::class, 'id_propietario');
    }
}
