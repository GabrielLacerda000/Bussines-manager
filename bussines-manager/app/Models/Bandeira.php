<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bandeira extends Model
{
    protected $guarded = [];

    public function grupoEconomico() {
        return $this->belongsTo(GrupoEconomico::class);
    }
}
