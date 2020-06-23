@extends('layouts.app')

@section('content')
<div class="sidenav">
    <div class="login-main-text">
        <img src="/images/rocket.png" alt="logo" width="150px" heigh="150px">
        <h2>IMDBUDDY<br> Register Page</h2>
        <p>Login or register from here to access.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form method="post" action="/students">

                {{ csrf_field() }}
                @if( $errors->any() )
                @component('components/alert')
                @slot('type', 'danger')
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
                @endcomponent
                @endif
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="John" id="firstName" name="firstName">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Doe" id="lastName" name="lastName">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="r-number@student.thomasmore.be" id="email"
                        name="email">
                    <div id="uname_response"></div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" class="form-control" placeholder="Password" id="passwordConfirmation"
                        name="passwordConfirmation">
                </div>
                <input type="submit" class="btn btn-black" value="Register" />
                <div class="form-group">
                    <p>Already an account? <a href="login" class="link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection