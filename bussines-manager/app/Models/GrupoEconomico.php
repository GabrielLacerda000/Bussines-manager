<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class GrupoEconomico extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = 'grupos_economicos';
    protected $guarded = [];

    public function bandeiras() {
        return $this->hasMany(Bandeira::class);
    }
}
