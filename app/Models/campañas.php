<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
class campañas extends Model
{
    use HasFactory;
    public function recursos()
    {
        return $this->hasMany(campanna_recursos::class);
    }
}
