<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Noticia extends Model
{
    use HasFactory;

    public function centros(): HasOne{
        return $this->hasOne(Centro::class,'centro_id');
    }
}
