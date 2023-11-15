<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    public function Pays()
    {
        return $this->hasMany(Pays::class, 'country_code', 'alpha2');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id');
    }

}
