<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notas extends Model
{
    use HasFactory;
    public function parato()
    {
        return $this->belongsTo(contacto::class, 'para');
    }
    public function usuarios()
    {
        return $this->belongsTo(usuarios::class, 'creador');
    }
}
