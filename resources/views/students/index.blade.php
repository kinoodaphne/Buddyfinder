@extends('layouts.index')
{{-- <?php if (isset($status)) : ?>
        <div class="status"><?php echo $status; ?></div>
    <?php endif; ?> --}}

@component('components/nav')
@endcomponent

@component('components/search')
<section class="search-sec container">

    <div class="row">
        <div class="col-lg-12 has-search">
            <form action="search" method="post">
                <span class="fa fa-search form-control-feedback"></span>
                <input class="form-control " type="search" name="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 p-2">
                        <select class="form-control search-slt" id="exampleFormControlSelect1">
                            <option>Select
                                interests</option>
                            <option>Gaming</option>
                            <option>Music</option>
                            <option>Party</option>
                            <option>Food</option>
                            <option>Sports</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 p-2">
                        <select class="form-control search-slt" id="exampleFormControlSelect1">
                            <option>Select specialization</option>
                            <option>Development</option>
                            <option>Design</option>
                            <option>Both</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 p-2">
                        <select class="form-control search-slt" id="exampleFormControlSelect1">
                            <option>Select course year</option>
                            <option>1 IMD</option>
                            <option>2 IMD</option>
                            <option>3 IMD</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 p-2">
                        <button type="button" class="btn btn-primary wrn-btn">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endcomponent

@section('content')
<div class="container-top container-card">
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 align="center">All Students</h3>
            <br />
        </div>
    </div>
    @if($flash = session('message'))
    <div class="alert alert-success">{{ $flash }}</div>
    @endif
    <div class="card-deck row row-table">
        @foreach ($students as $student)

        <div class="col-3">
            <div class="img-container">
                <img src="{{ $student->profile_picture }}" class="card-img-top stretchy" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $student->firstName }} {{ $student->lastName }}</h5>
                <p class="card-text">{{ $student->bio }}</p>
                <p class="card-text"><small class="text-muted">{{ $student->location }}</small></p>
                <button class="btn btn-primary"><a href="/students/{{ $student->id }}">View
                        Profile</a></button>
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
    </div>
</div>
@endsection