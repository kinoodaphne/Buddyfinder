@extends('layouts.index')
{{-- <?php if (isset($status)) : ?>
        <div class="status"><?php echo $status; ?></div>
    <?php endif; ?> --}}

@component('components/nav')
<a class="navbar-brand" href="index">
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
      <a class="nav-link" href="index">Home</a>
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
<div class="container-fluid">
  <h1>Edit Profile</h1>
  <hr>
  <div class="row">

    <div class="col-lg-2">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="tabs nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
          aria-controls="v-pills-home" aria-selected="true">Account details</a>
        <a class="tabs nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
          aria-controls="v-pills-profile" aria-selected="false">Tags</a>
        <a class="tabs nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab"
          aria-controls="v-pills-password" aria-selected="false">Password</a>
      </div>
    </div>

    <div class="tab-content col-lg-10" id="v-pills-tabContent">
      <!-- edit form column -->
      <div class="col-lg-5 personal-info tab-pane fade show active" id="v-pills-home" role="tabpanel"
        aria-labelledby="v-pills-home-tab">
        <h3>Personal info</h3>

        <form role="form" method="post" action="/students" enctype="multipart/form-data">
          {{ csrf_field() }}

          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="" class="avatar rounded-circle" alt="avatar" id="avatar" name="avatar" width="150" height="150">
              <h6>Upload a different photo...</h6>

              <input type="file" class="form-control" name="avatar" id="avatar">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" name="firstName" id="firstName">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" name="lastName" id="lastName">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="" name="email" id="email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Location:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="" name="location" id="location">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Biography:</label>
            <div class="col-md-8">
              <textarea class="form-control" rows="8" id="bio" name="bio"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="submit" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>

        <div class="col-lg-5 personal-info tab-pane fade" id="v-pills-profile" role="tabpanel"
          aria-labelledby="v-pills-profile-tab">
          <h3>Interests</h3>
          <form method=" post" action="changePassword">
            <div class="form-group">
              <label class="col-md-6 control-label">Current password:</label>
              <div class="col-md-10">
                <input class="form-control" type="password" name="currentPassword" id="password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label">New password:</label>
              <div class="col-md-10">
                <input class="form-control" type="password" id="password" name="newPassword">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label">Confirm password:</label>
              <div class="col-md-10">
                <input class="form-control" type="password" id="password" name="newPasswordConfirmation">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label"></label>
              <div class="col-md-10">
                <input type="submit" class="btn btn-primary" value="Save Changes">
                <span></span>
                <input type="submit" class="btn btn-default" value="Cancel">
              </div>
            </div>
          </form>
        </div>

        <div class="col-lg-5 personal-info tab-pane fade" id="v-pills-password" role="tabpanel"
          aria-labelledby="v-pills-password-tab">
          <h3>Password</h3>
          <form method=" post" action="changePassword">
            <div class="form-group">
              <label class="col-md-6 control-label">Current password:</label>
              <div class="col-md-10">
                <input class="form-control" type="password" name="currentPassword" id="password">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label">New password:</label>
              <div class="col-md-10">
                <input class="form-control" type="password" id="password" name="newPassword">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label">Confirm password:</label>
              <div class="col-md-10">
                <input class="form-control" type="password" id="password" name="newPasswordConfirmation">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-6 control-label"></label>
              <div class="col-md-10">
                <input type="submit" class="btn btn-primary" value="Save Changes">
                <span></span>
                <input type="submit" class="btn btn-default" value="Cancel">
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  @endsection