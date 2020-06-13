@extends('layouts.app')
@section('content')

    <div class="container">
        <a href="/home">
            <button class="btn btn-link btn-lg mb-4" type="button">Back to main menu</button>
        </a>
        @if(Session::has('Mistake'))
            <div class="alert alert-success" role="alert">
                {{session('Mistake')}}
            </div>
        @endif
        @if(Session::has('Overload'))
            <div class="alert alert-success" role="alert">
                {{session('Overload')}}
            </div>
        @endif
        @if(Session::has('Success'))
            <div class="alert alert-success" role="alert">
                {{session('Success')}}
            </div>
        @endif
        @if(Session::has('End_time'))
            <div class="alert alert-success" role="alert">
                {{session('End_time')}}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-body">

                        <h5 class="card-title">Name of tournament: </h5>
                        <p>{{ $tournament->name }}</p>
                        <h5 class="card-title">Owner: </h5>
                        <p>{{ $tournament->Owner->name }}</p>
                        <hr/>
                        <h5 class="card-title">Discipline: </h5>
                        <p>{{ $tournament->discipline }}</p>
                        <h5 class="card-title">Location: </h5>
                        <p>{{ $tournament->location }}
                        (<a href="https://maps.google.com/?q={{ $tournament->latitude }},{{ $tournament->longitude }}" target="_blank" class="card-link">Google maps location</a>)
                        </p>
                        <hr/>
                        <h5 class="card-title">Time: </h5>
                        <p>{{ $tournament->time }}</p>
                        <h5 class="card-title">Deadline: </h5>
                        <p>{{ $tournament->end_time }}</p>
                        <hr/>
                        <h5 class="card-title">Limit of participants: </h5>
                        <p>{{ $tournament->participation_limit }}</p>
                        <h5 class="card-title">Signed participants: </h5>
                        <p>{{ $tournament->signed() }}</p>
                        <h5 class="card-title">Remaining place: </h5>
                        <p>{{ $tournament->participation_limit - $tournament->signed() }}</p>
                        <hr/>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-1">
                                    <a href="/tournaments/{{$tournament->id}}/apply" class="h5 mb-0">
                                        <button type="submit" class="btn btn-primary">
                                            Sign up!
                                        </button>
                                    </a>
                                    @can('update', $tournament)
                                        <a href="/tournaments/{{ $tournament->id }}/edit" class="card-link">
                                            <button type="submit" class="btn btn-primary">
                                                edit
                                            </button>
                                        </a>
                                        <a href="/tournaments/{{$tournament->id}}/createBoard" class="h5 mb-0">
                                            <button type="submit" class="btn btn-primary">
                                                Create game board!
                                            </button>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Sponsors: </h5>
                    @foreach($tournament->getLogos() as $logo)
                        <img width="150" height="150" src="{{ "/storage/$logo->uri" }}"  class="rounded-circle">
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
