@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>Your's tournament</span>
                    </div>

                    <div class="card-body">
                        @forelse($tournaments as $tournament)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <a href="/tournaments/{{ $tournament->id }}" class="text-dark card-link">
                                        <h3 class="card-title mb-3">
                                            Name of event: {{ $tournament->name }}
                                        </h3></a>
                                    <a href="/tournaments/{{ $tournament->id }}" class="card-link">Show details</a>
                                </div>
                            </div>
                        @empty
                            <p>You have not any tournament.</p>
                        @endforelse
                        {{ $tournaments->links() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
