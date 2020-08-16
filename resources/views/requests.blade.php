@extends('layouts.index')
{{-- <?php if (isset($status)) : ?>
        <div class="status"><?php echo $status; ?></div>
    <?php endif; ?> --}}

@component('components/nav')
@endcomponent

@component('components/search')
@endcomponent

@section('content')
<div class="container-top container-card">
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 align="center">Vriendschapsverzoeken</h3>
            <br />
        </div>
    </div>
    @if($flash = session('message-success'))
    <div class="alert alert-success">{{ $flash }}</div>
    @elseif ($flash = session('message-error'))
    <div class="alert alert-danger">{{ $flash }}</div>
    @endif
    <div class="card-deck row row-table">
        @foreach($friendsRequests as $request)
        <?php
            $sender_id = \App\User::getUserId($request->user_id);
            $sender_name = \App\User::getUserName($request->user_id);
            $sender_lastName = \App\User::getUserLastName($request->user_id);
            $sender_location = \App\User::getUserLocation($request->user_id);
            $sender_buddy = \App\User::getUserBuddy($request->user_id);
            $sender_year = \App\User::getUserYear($request->user_id);
            $sender_study_field = \App\User::getUserStudyField($request->user_id);
            $sender_profilePicture = \App\User::getUserProfilePicture($request->user_id);

            $sender_music = \App\User::getUserMusic($request->user_id);
            $sender_books = \App\User::getUserBooks($request->user_id);
            $sender_gaming = \App\User::getUserGaming($request->user_id);
            $sender_series = \App\User::getUserSeries($request->user_id);
            $sender_travel = \App\User::getUserTravel($request->user_id);

        ?>
        <div class="col-sm-3">
            <div class="card-container">
                <img src="/uploads/avatars/{{ $sender_profilePicture }}" class="card-img-top stretchy" alt="...">
            </div>
            <div class="card-body">
                <a target="blank" href="/users/{{ $sender_id }}">
                    <h5 class="card-title text-black">{{ $sender_name }} {{ $sender_lastName }}</h5>
                </a>
                <p class="card-text"><small class="text-muted">{{ $sender_location }}</small></p>
                <p class="card-text">{{ $sender_buddy }}</p>
                <p class="card-text">{{ $sender_year }} - {{ $sender_study_field }}</p>
                <p class="card-text">Muziek: <b>{{ $sender_music }}</b></p>
                <p class="card-text">Boeken: <b>{{ $sender_books }}</b></p>
                <p class="card-text">Games: <b>{{ $sender_gaming }}</b></p>
                <p class="card-text">Series: <b>{{ $sender_series }}</b></p>
                <p class="card-text">Reizen: <b>{{ $sender_travel }}</b></p>

                <a href="/accept-request/{{ $sender_id }}"><button class="btn btn-primary">Accepteer</button></a>
                <a href="/cancel-request/{{ $sender_id }}"><button class="btn btn-outline-danger">Weiger</button></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<hr>
@endsection