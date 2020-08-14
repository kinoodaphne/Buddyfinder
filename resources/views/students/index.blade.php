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
            <h3 align="center">Alle Studenten</h3>
            <br />
        </div>
    </div>
    @if($flash = session('message'))
    @component('components/alert')
    @slot('type', 'success')
    {{ $flash }}
    @endslot
    @endcomponent
    @endif
    <div class="card-deck row row-table">
        @foreach ($users as $user)

        <div class="col-sm-3">
            <div class="card-container">
                <img src="/uploads/avatars/{{ $user->profile_picture }}" class="card-img-top stretchy" alt="...">

            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }} {{ $user->lastName }}</h5>
                <p class="card-text"><small class="text-muted">{{ $user->location }}</small></p>
                <p class="card-text">{{ $user->buddy }}</p>
                <p class="card-text">{{ $user->year }} - {{ $user->study_field }}</p>
                <p class="card-text">Muziek: <b>{{ $user->music }}</b></p>
                <p class="card-text">Boeken: <b>{{ $user->books }}</b></p>
                <p class="card-text">Games: <b>{{ $user->gaming }}</b></p>
                <p class="card-text">Series: <b>{{ $user->series }}</b></p>
                <p class="card-text">Reizen: <b>{{ $user->travel }}</b></p>

                <a href="/users/{{ $user->id }}"><button class="btn btn-primary">Bekijk profiel</button></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<hr>
@endsection