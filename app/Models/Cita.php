<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Centro;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cita extends Model
{
    use HasFactory;

    //protected $fillable=['estado','fechainicio','fechafin'];

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function medico(): BelongsTo
    {
        return $this->belongsTo(User::class,'medico_id');
    }


    public function centro(): BelongsTo
    {
        return $this->belongsTo(Centro::class, 'centro_id');
    }
}
