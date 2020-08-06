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
    @if($flash = session('message'))
    <div class="alert alert-danger">{{ $flash }}</div>
    @endif
    <div class="card-deck row row-table">
        @if(isset($details))
        @foreach($details as $user)
        <div class="col-sm-3">
            <div class="card-container">
                <img src="{{ $user->profile_picture }}" class="card-img-top stretchy" alt="...">
                <!-- <img src="/images/profile.jpeg" class="card-img-top" alt="..."> -->
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }} {{ $user->lastName }}</h5>
                <p class="card-text"><small class="text-muted">{{ $user->location }}</small></p>
                <p class="card-text">{{ $user->buddy }}</p>
                <p class="card-text">Films</p>
                <p class="card-text">Racing</p>
                <p class="card-text">{{ $user->study_field }}</p>
                <p class="card-text">{{ $user->year }}</p>

                <a href="/users/{{ $user->id }}"><button class="btn btn-primary">Bekijk profiel</button></a>

                {{-- <?php
                        if ($friend->checkIfFriends($user->getId(), $profile['id'])) {
                            echo '';
                        } else {
                            echo '<button class="btn btn-primary"><a href="functions.php?action=send_req&id=' . $profile['id'] . '">Send Request</a></button>';
                        }
                        ?> --}}
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection