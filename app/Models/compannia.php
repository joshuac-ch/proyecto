<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compannia extends Model
{
    use HasFactory;
    public function seguimientos()
    {
        return $this->morphMany(Seguimiento::class, 'cliente');
    }
}
