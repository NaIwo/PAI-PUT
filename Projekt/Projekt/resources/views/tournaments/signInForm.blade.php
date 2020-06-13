@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fill yours data') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/tournaments/{{$tournament->id}}/apply" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="license" class="col-md-4 col-form-label text-md-right">{{ __('License') }}</label>

                                <div class="col-md-6">
                                    <input id="license" type="text" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ old('license') }}" required autocomplete="license" autofocus>

                                    @error('license')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ranking" class="col-md-4 col-form-label text-md-right">{{ __('Ranking') }}</label>

                                <div class="col-md-6">
                                    <input id="ranking" type="text" class="form-control @error('ranking') is-invalid @enderror" name="ranking" value="{{ old('ranking') }}" required autocomplete="ranking">

                                    @error('ranking')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sign up!') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
