<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tournament extends Model
{
    protected $guarded = [];


    public function Owner(){
        return $this->belongsTo('App\User', 'owner');
    }

    public function getLogos()
    {
        return DB::table('logos')->where('tournament_id', $this->id)->get();
    }

    public function signed(){
        return  $this->belongsToMany('App\User', 'participations')->count();
    }
    public function participants()
    {
        return $this->belongsToMany('App\User', 'participations');
    }
    public function getPlayers()
    {
        return $this->belongsToMany('App\User', 'participations')->withPivot('license', 'ranking')->withTimestamps();;
    }
    public function setFirstRound()
    {
        $allParticipants = $this->getPlayers->shuffle()->toArray();

        $made = DB::table('boards')
            ->where('tournament_id', '=', $this->id)
            ->count();

        if($made == 0) {
            $start = 0;
            if(count($allParticipants) % 2 == 1) {
                $start = 1;
                Board::create([
                    'tournament_id' => $this->id,
                    'id_player_1' => $allParticipants[0]['id'],
                    'id_player_2' => $allParticipants[0]['id'],
                ]);
            }
            for ($i = $start; $i < count($allParticipants); $i += 2) {
                Board::create([
                    'tournament_id' => $this->id,
                    'id_player_1' => $allParticipants[$i]['id'],
                    'id_player_2' => $allParticipants[$i + 1]['id'],
                ]);
            }
        }
    }
}
