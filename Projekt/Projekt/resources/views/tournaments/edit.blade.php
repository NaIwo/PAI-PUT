@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Tournament') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/tournaments/{{$tournament->id}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') ?? $tournament->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="time"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Time') }}</label>

                                <div class="col-md-6">
                                    <input id="time" type="datetime-local"
                                           class="form-control @error('time') is-invalid @enderror" name="time"
                                           value="{{ old('time') ?? $tournament->time}}" required>

                                    @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="location"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text"
                                           class="form-control @error('location') is-invalid @enderror" name="location"
                                           value="{{ old('location') ?? $tournament->location}}"
                                           required>

                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="latitude"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Latitude') }}</label>

                                <div class="col-md-6">
                                    <input id="latitude" type="text"
                                           class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                                           value="{{ old('latitude') ?? $tournament->latitude}}"
                                           required>

                                    @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="longitude"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Longitude') }}</label>

                                <div class="col-md-6">
                                    <input id="longitude" type="text"
                                           class="form-control @error('longitude') is-invalid @enderror" name="longitude"
                                           value="{{ old('longitude') ?? $tournament->longitude}}"
                                           required>

                                    @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discipline"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Discipline') }}</label>

                                <div class="col-md-6">
                                    <input id="discipline" type="text"
                                           class="form-control @error('discipline') is-invalid @enderror" name="discipline"
                                           value="{{ old('discipline') ?? $tournament->discipline}}"
                                           required>

                                    @error('discipline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="participation_limit"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Limit of Participations') }}</label>

                                <div class="col-md-6">
                                    <input id="participation_limit" type="number"
                                           class="form-control @error('participation_limit') is-invalid @enderror" name="participation_limit"
                                           min="2"
                                           max="32"
                                           value="{{ old('participation_limit') ?? $tournament->participation_limit}}"
                                           required>

                                    @error('participation_limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_time"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                                <div class="col-md-6">
                                    <input id="end_time" type="datetime-local"
                                           class="form-control @error('end_time') is-invalid @enderror"
                                           name="end_time"
                                           value="{{ old('end_time') ?? $tournament->end_time}}"
                                           required>

                                    @error('end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logos[]"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Sponsor logos') }}</label>

                                <div class="col-md-6">
                                    <input id="logos[]" type="file"
                                           class="form-control-file @error('logos') is-invalid @enderror"
                                           name="logos[]"
                                           accept="image/*"
                                           multiple>

                                    @error('logos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span class="text-danger" role="alert">
                                        New logos override the previous ones.
                                    </span>
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update!') }}
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
