<?php

namespace App\Http\Controllers;

use App\Logos;
use App\Participations;
use App\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TournamentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Tournament $tournament)
    {
        return view('tournaments.show', compact('tournament'));
    }

    public function createTournament()
    {
        return view('tournaments.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['string', 'required', 'max:255','unique:tournaments'],
            'discipline' => ['string', 'required', 'max:255'],
            'time' => ['date', 'required', 'after:today'],
            'location' => ['required'],
            'latitude' => ['numeric','required'],
            'longitude' => ['numeric','required'],
            'participation_limit' => ['numeric', 'required', 'between:2,64'],
            'end_time' => ['date', 'required', 'before_or_equal:time', 'after:yesterday'],
            'logos.*' => ['file', 'mimes:jpeg,bmp,png']
        ]);

        $tournament = Tournament::create([
            'name' => $data['name'],
            'discipline' => $data['discipline'],
            'owner' => auth()->id(),
            'time' => $data['time'],
            'location' => $data['location'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'participation_limit' => $data['participation_limit'],
            'end_time' => $data['end_time'],
        ]);

        if (!empty(request()->file('logos'))) {
            foreach (request()->file('logos') as $logo) {
                Logos::store($tournament, $logo->store('logos', 'public'));
            }
        }

        return redirect()->route('home');
    }

    public function showMyTournaments()
    {
        $tournaments = auth()->user()->myTournaments()->paginate(10);
        return view('tournaments.myTournament', compact('tournaments'));
    }
    public function showSignedTournament()
    {
        $tournaments = DB::table('tournaments')
            ->join('participations', 'participations.tournament_id', '=', 'tournaments.id')
            ->where('participations.user_id', '=', auth()->user()->id)
            ->paginate(10);
        return view('tournaments.showSignedTournament', compact('tournaments'));
    }
    public function showUpcoming($days)
    {
        $tournaments = DB::table('tournaments')
            ->join('participations', 'participations.tournament_id', '=', 'tournaments.id')
            ->where('participations.user_id', '=', auth()->user()->id)
            ->where('tournaments.time', '<=', now()->addDays($days))
            ->paginate(10);

        return view('tournaments.showSignedTournament', compact('tournaments'));
    }

    public function createBoard(Tournament $tournament){
        $this->authorize("update", $tournament);
        if($tournament->time <= now())
            $tournament->setFirstRound();
        else return redirect('tournaments/' . $tournament->id)->with('End_time', 'That is not a time to start!');
        return redirect('tournaments/' . $tournament->id);
    }



    public function showAll()
    {
        $tournaments = DB::table('tournaments')->paginate(10);
        return view('tournaments.showAll', compact('tournaments'));
    }


    public function signup(Tournament $tournament){

        $data = request()->validate([
            'license' => ['numeric', 'max:255','unique:participations'],
            'ranking' => ['numeric', 'max:255','unique:participations']
        ]);
        try {
            DB::transaction(function () use ($data, $tournament) {
                if ($tournament->participation_limit - $tournament->signed() > 0) {
                    Participations::create([
                        'user_id' => auth()->user()->id,
                        'tournament_id' => $tournament->id,
                        'license' => $data['license'],
                        'ranking' => $data['ranking'],
                    ]);
                } else {
                    return redirect('tournaments/' . $tournament->id)
                        ->with('Overload', 'It is too many people!');
                }
            });
        } catch (\Exception $e) {
            return redirect('tournaments/' . $tournament->id)
                ->with('Overload', 'It is too many people!');
        }

        return redirect('tournaments/'.$tournament->id)->with('Success', 'You are signed up!');

    }
    public function signinForm(Tournament $tournament){


        if($tournament->participation_limit - $tournament->signed()==0)
            return redirect('tournaments/'.$tournament->id)->with('Overload', 'It is too many people!');
        if($tournament->participants->contains(auth()->id()))
            return redirect('tournaments/'.$tournament->id)->with('Mistake', 'You are already signed up!');
        if($tournament->end_time <= now())
            return redirect('tournaments/'.$tournament->id)->with('End_time', 'End of time to sign up!');

        return view('tournaments.signInForm', compact('tournament'));

    }
    public function edit(Tournament $tournament){
        $this->authorize("update", $tournament);
        return view('tournaments.edit', compact('tournament'));
    }

    public function update(Tournament $tournament)
    {
        $data = request()->validate([
            'name' => ['string', 'required', 'max:255',Rule::unique('tournaments')->ignore($tournament->id)],
            'discipline' => ['string', 'required', 'max:255'],
            'time' => ['date', 'required', 'after:today'],
            'location' => ['required'],
            'latitude' => ['numeric','required'],
            'longitude' => ['numeric','required'],
            'participation_limit' => ['numeric', 'required', 'between:2,64'],
            'end_time' => ['date', 'required', 'before_or_equal:time', 'after:yesterday'],
            'logos.*' => ['file', 'mimes:jpeg,bmp,png']
        ]);

        $tournament->update([
            'name' => $data['name'],
            'discipline' => $data['discipline'],
            'owner' => auth()->id(),
            'time' => $data['time'],
            'location' => $data['location'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'participation_limit' => $data['participation_limit'],
            'end_time' => $data['end_time'],
        ]);

        if (!empty(request()->file('logos'))) {
            $logos = Logos::where('tournament_id', $tournament->id)->get();
            if ($logos->count() > 0) {
                foreach ($logos as $logo) {
                    File::delete($logo->uri);
                }
                $logos->each->delete();
            }

            foreach (request()->file('logos') as $logo) {
                Logos::store($tournament, $logo->store('logos', 'public'));
            }
        }
        return redirect('tournaments/' . $tournament->id);
    }

}
