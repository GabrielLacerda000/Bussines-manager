<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $guarded = [];

    public function bandeira() {
        return $this->belongsTo(Bandeira::class);
    }
}
