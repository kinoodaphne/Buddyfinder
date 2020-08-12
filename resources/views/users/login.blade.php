@extends('layouts.app')

@section('content')
<div class="sidenav">
    <div class="login-main-text">
        <img src="{{ asset('images/rocket.png') }}" alt="logo" width="150px" heigh="150px">
        <h2>IMDBUDDY<br> Meld aan</h2>
        <p>Login or register from here to access.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-main-text-mobile">
            <img src="{{ asset('images/rocket.png') }}" alt="logo" width="150px" heigh="150px">
            <h2>IMDBUDDY<br> Meld aan</h2>
            <p>Login or register from here to access.</p>
        </div>
        <div class="login-form">
            <h2 class="pb-2 text-center">Meld aan</h2>
            <form method="post" action="">

                @auth
                <div class="alert alert-info">Je bent ingelogd!</div>
                @endauth

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
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="r-number@student.thomasmore.be" id="email"
                        name="email">
                </div>
                <div class="form-group">
                    <label>Wachtwoord</label>
                    <input type="password" class="form-control" placeholder="Wachtwoord" id="password" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-color" value="Login" />
                </div>
                <div class="form-group">
                    <p>Nog geen account? <a href="register" class="link-reg">Registeer</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection