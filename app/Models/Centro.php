<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Noticia;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Centro extends Model
{
    use HasFactory;

    public function noticias(): HasMany{
        return $this->hasMany(Noticia::class,'centro_id');
    }

    public function componentes(): BelongsToMany{
        return $this->belongsToMany(User::class,'centro_user');
    }
}


