@extends('layouts.index')

@component('components/nav')
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