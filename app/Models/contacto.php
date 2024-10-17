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
}
