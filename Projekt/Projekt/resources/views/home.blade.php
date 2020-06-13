@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{Auth::user()->name}}</div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Searching for opportunity? Let's take a look!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a class="btn btn-link" href="tournaments/showAll">
                        <h1>Show all tournaments</h1>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ready to start?</div>

                <div class="card-body">

                    <span class="btn btn-link">
                        <h1>Show upcoming tournaments</h1>
                    </span>
                    <hr>
                    <a class="btn btn-link" href="tournaments/showUpcoming/1">
                        <h3> today </h3>
                    </a>
                    <a class="btn btn-link" href="tournaments/showUpcoming/7">
                        <h3> 7 days </h3>
                    </a>
                    <a class="btn btn-link" href="tournaments/showUpcoming/14">
                        <h3> 14 days </h3>
                    </a>
                    <a class="btn btn-link" href="tournaments/showUpcoming/21">
                        <h3> 21 days </h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check your's tournament</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a class="btn btn-link" href="tournaments/showMyTournaments">
                        <h1>Show created tournaments</h1>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check your's tournament</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a class="btn btn-link" href="tournaments/showSignedTournament">
                        <h1>Show signed tournaments</h1>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Are you motivated? Make your own challenge! </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        <a class="btn btn-link" href="/tournaments/create">
                            <h1>Create tournament</h1>
                        </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
