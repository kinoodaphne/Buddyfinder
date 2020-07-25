@extends('layouts.index')
@component('components/nav')
<a class="navbar-brand" href="/">
    <img src="{{ asset('images/rocket.png') }}" width="30" height="30" class="d-inline-block align-top" alt="IMDbuddy">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="mr-auto"></div>
    <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="buddies">Buddies</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="notifications">Requests
                {{-- <span class="<?php if ($getRequestNumber > 0) {
                                    echo 'redBadge';
                                } else {
                                    echo 'badge';
                                } ?>">
                        <?php echo $getRequestNumber; ?></span> --}}
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                FirstName LastName
            </a>
            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="myProfile">View profile</a>
                <a class="dropdown-item" href="editProfile">Edit profile</a>
                <a class="dropdown-item" href="logout">Log out</a>
            </div>

        </li>
    </ul>
</div>
@endcomponent

@section('content')
<h1>{{ $student->firstName }} {{ $student->lastName }}</h1>
{{-- <h2>Friends</h2>
 @foreach ($student->friends as $friend)
 <div>{{ $friend->user_one }}</div>
@endforeach --}}
<hr>
<div class="row">
    <!-- left column -->
    <div class="col-md-2">
        <div class="text-center">
            <img src="{{ $student->profile_picture }}" class="avatar rounded-circle" alt="avatar" id="avatar"
                name="avatar" width="150" height="150">
        </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 personal-info">
        {{-- <?php if (isset($status)) : ?>
            <div class="alert alert-info alert-dismissable">
                <?php echo $status; ?>
            </div>
        <?php endif; ?> --}}
        <h3>Personal info</h3>



        <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="{{ $student->firstName }}" name="firstName"
                    id="firstName">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="{{ $student->lastName }}" name="lastName" id="lastName">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="{{ $student->email }}" name="email" id="email">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Location:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="{{ $student->location }}" name="location" id="location">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Study field:</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" value="{{ $student->study_field }}" name="study_field"
                    id="study_field">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">Biography:</label>
            <div class="col-lg-8">
                <textarea class="form-control" rows="8" id="biography" name="biography">{{ $student->bio }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        {{-- <?php
        if ($alreadyFriends) {
            echo '<button class="btn btn-primary"><a href="functions.php?action=unfriend_req&id=' . $userProfile->getId() . '">Unfriend</a></button>';
        } elseif ($checkRequestSender) {
            echo '<button class="btn btn-primary"><a href="functions.php?action=cancel_req&id=' . $userProfile->getId() . '">Cancel request</a></button>';
        } elseif ($checkRequestReceiver) {
            echo '<div>
                <h5> Incoming request</h5>
                <button class="btn btn-secondary"><a href="functions.php?action=ignore_req&id=' . $userProfile->getId() . '">Ignore</a></button>&nbsp;
                <button class="btn btn-primary"><a href="functions.php?action=accept_req&id=' . $userProfile->getId() . '">Accept</a></button>
            </div>';
        } else {
            echo '<button class="btn btn-primary"><a href="functions.php?action=send_req&id=' . $userProfile->getId() . '">Send Request</a></button>';
        } ?> --}}
    </div>
</div>
<hr>
@endsection