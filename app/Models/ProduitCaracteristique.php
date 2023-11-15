<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduitCaracteristique extends Model
{
    //

    public function attributes() {
        // return $this->belongTo(Attribute::class)
        return $this->belongTo(Caracteristique::class);
    }
}

