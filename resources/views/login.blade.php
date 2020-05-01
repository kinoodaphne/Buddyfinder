<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/rocket.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>IMDbuddy</title>
</head>

<body>
    <div class="container">
        <div class="sidenav">
            <div class="login-main-text">
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
                            <input type="email" class="form-control" placeholder="r-number@student.thomasmore.be" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        </div>
                        <input type="submit" class="btn btn-black" value="Login" />
                        <div class="form-group">
                            <p>No account? <a href="register">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>