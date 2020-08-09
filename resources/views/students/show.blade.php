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
        <h3>{{ $user->name }} {{ $user->lastName }}</h3>
        <p class="pb-2">{{ $user->buddy }}</p>
        <div class="form-group">
            <div class="col-lg-8">
                Woonplaats: {{ $user->location }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
                Email: {{ $user->email }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
                Jaar : {{ $user->year }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
                Keuzerichting : {{ $user->study_field }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-8">
                Over mezelf : {{ $user->bio }}
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