<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Colaborador extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'colaboradores';
    protected $guarded = [];

    public function unidade() {
        return $this->belongsTo(Unidade::class);
    }
}
