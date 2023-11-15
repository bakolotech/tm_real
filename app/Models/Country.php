<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pays()
    {
        return $this->hasOne(Pays::class, 'alpha3', 'iso3');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'country_code', 'iso2');
    }

}
