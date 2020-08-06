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
            <h3 align="center">Vrienden</h3>
            <br />
        </div>
    </div>
    @if($flash = session('message-success'))
    <div class="alert alert-success">{{ $flash }}</div>
    @elseif ($flash = session('message-error'))
    <div class="alert alert-danger">{{ $flash }}</div>
    @endif
    <div class="card-deck row row-table">
        @foreach($friends as $request)
        <?php
            $sender_id = \App\User::getUserId($request->user_id);
            $sender_name = \App\User::getUserName($request->user_id);
            $sender_lastName = \App\User::getUserLastName($request->user_id);
            $sender_location = \App\User::getUserLocation($request->user_id);
            $sender_buddy = \App\User::getUserBuddy($request->user_id);
            $sender_year = \App\User::getUserYear($request->user_id);
            $sender_study_field = \App\User::getUserStudyField($request->user_id);
            $sender_profilePicture = \App\User::getUserProfilePicture($request->user_id);

        ?>
        <div class="col-sm-3">
            <div class="card-container">
                <img src="{{ $sender_profilePicture }}" class="card-img-top stretchy" alt="...">
                <!-- <img src="/images/profile.jpeg" class="card-img-top" alt="..."> -->
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $sender_name }} {{ $sender_lastName }}</h5>
                <p class="card-text"><small class="text-muted">{{ $sender_location }}</small></p>
                <p class="card-text">{{ $sender_buddy }}</p>
                <p class="card-text">Films</p>
                <p class="card-text">Racing</p>
                <p class="card-text">{{ $sender_study_field }}</p>
                <p class="card-text">{{ $sender_year }}</p>

                <a href="/users/{{ $sender_id }}"><button class="btn btn-primary">Bekijk profiel</button></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection