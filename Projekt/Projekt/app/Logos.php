<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logos extends Model
{
    protected $guarded = [];

    public static function store($tournament, $logo_path){

        Logos::create([
            'tournament_id' => $tournament->id,
            'uri' => $logo_path
        ]);
    }


}
