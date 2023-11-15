<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getOne()
    {
        return City::with(
            [
                'state'
            ]
        )//->where([['locked', 0], ['deleted', 0]])
            ;
    }

}
