<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class formularios extends Model
{
    use HasFactory;
    public function recurso()
    {
        return $this->morphMany(campanna_recursos::class, 'recursoable');
    }
}
