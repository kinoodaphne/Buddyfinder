@extends('layouts.app')

@section('content')
<div class="sidenav">
    <div class="login-main-text">
        <img src="/images/rocket.png" alt="logo" width="150px" heigh="150px">
        <h2>IMDBUDDY<br> Login Page</h2>
        <p>Login or register from here to access.</p>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form method="post">
                {{-- <div class="form__error">
                            <p> <?php echo $error ?> </p>
                        </div> --}}
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="r-number@student.thomasmore.be" id="email"
                        name="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                </div>
                <input type="submit" class="btn btn-black" value="Login" />
                <div class="form-group">
                    <p>No account? <a href="register" class="link">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
