@extends('layouts.index')

@component('components/nav')
@endcomponent

@section('content')

<hr>
<div class="row">
    <!-- left column -->
    <div class="col-md-2">
        <div class="text-center">
            <img src="{{ $user->profile_picture }}" class="avatar rounded-circle" alt="avatar" id="avatar" name="avatar"
                width="150" height="150">
        </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 personal-info">
        <h3>Persoonlijke informatie</h3>

        <div class="form-group">
            <label class="col-lg-3 control-label">Voornaam:</label>
            <div class="col-lg-8">
                <input readonly class="form-control-plaintext" type="text" value="{{ $user->name }}" name="name"
                    id="name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Achternaam:</label>
            <div class="col-lg-8">
                <input readonly class="form-control-plaintext" type="text" value="{{ $user->lastName }}" name="lastName"
                    id="lastName">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
                <input readonly class="form-control-plaintext" type="text" value="{{ $user->email }}" name="email"
                    id="email">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Woonplaats:</label>
            <div class="col-lg-8">
                <input readonly class="form-control-plaintext" type="text" value="{{ $user->location }}" name="location"
                    id="location">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Keuzerichting:</label>
            <div class="col-lg-8">
                <input readonly class="form-control-plaintext" type="text" value="{{ $user->study_field }}"
                    name="study_field" id="study_field">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Korte omschrijving:</label>
            <div class="col-lg-8">
                <textarea readonly class="form-control-plaintext" rows="8" id="biography"
                    name="biography">{{ $user->bio }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        @if (\Auth::check())
        @if (\Auth::user()->id == $user->id)
        <a href="/users/edit/{{ $user->id }}">
            <button class="btn btn-primary">Bewerk profiel</button>
        </a>
        @else
        @if (!empty($friendRequest))
        @if ( $friendRequest == "Verwijder" )
        <a href="/remove-friend/{{ $user->id }}">
            <button class="btn btn-outline-secondary">{{ $friendRequest }}</button>
        </a>
        @else
        <a href="/add-friend/{{ $user->id }}">
            <button class="btn btn-primary">{{ $friendRequest }}</button>
        </a>
        @endif
        @endif
        @endif
        @endif
    </div>
    {{-- <div class="col-lg-2">
        <h3>Friends</h3>

        <div>
            <h5>You have {{ count($user->friends) }} friends </h5>
    <ul>
        @foreach($user->friends as $friend)
        <li>{{ $friend->user1_id }} <-> {{ $friend->user2_id }}</li>
        @endforeach
    </ul>
    <p>View them <a class="buddies" href="buddies">here</a></p>
</div>
</div> --}}
</div>
<hr>
@endsection