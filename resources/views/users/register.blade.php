@extends('layouts.app')

@section('content')
<div class="sidenav">
    <div class="login-main-text">
        <img src="/images/rocket.png" alt="logo" width="150px" heigh="150px">
        <h2>IMDBUDDY<br> Registreer</h2>
        <p>Login or register from here to access.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-main-text-mobile">
            <img src="/images/rocket.png" alt="logo" width="150px" heigh="150px">
            <h2>IMDBUDDY<br> Meld aan</h2>
            <p>Login or register from here to access.</p>
        </div>
        <div class="login-form">
            <h2 class="pb-2 text-center">Registreer</h2>
            <form method="post" action="">

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
                    <label>Voornaam</label>
                    <input type="text" class="form-control" placeholder="John" id="firstName" name="firstName">
                </div>
                <div class="form-group">
                    <label>Achternaam</label>
                    <input type="text" class="form-control" placeholder="Doe" id="lastName" name="lastName">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="r-number@student.thomasmore.be" id="email"
                        name="email">
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="buddy">
                        <label class="form-check-label" for="inlineRadio1">Help een buddy</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="searcher">
                        <label class="form-check-label" for="inlineRadio2">Zoek een buddy</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keuzerichting:</label>
                    <input class="form-control" type="text" name="study_field" id="study_field"
                        placeholder="Design, Development, Both">
                </div>
                <div class="form-group">
                    <label>Studie jaar:</label>
                    <input class="form-control" type="text" name="year" id="year" placeholder="1IMD, 2IMD, 3IMD">
                </div>
                <div class="form-group">
                    <label>Wachtwoord</label>
                    <input type="password" class="form-control" placeholder="Wachtwoord" id="password" name="password">
                </div>
                <div class="form-group">
                    <label>Wachtwoord confirmatie</label>
                    <input type="password" class="form-control" placeholder="Confirmatie" id="passwordConfirmation"
                        name="passwordConfirmation">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-color" value="Registeer" />
                </div>
                <div class="form-group">
                    <p>Reeds een account? <a href="login" class="link-reg">Meld je aan</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection