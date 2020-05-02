<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/images/rocket.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/app.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>IMDbuddy</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index">
            <img src="images/rocket.png" width="30" height="30" class="d-inline-block align-top" alt="IMDbuddy">
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
    </nav>
    {{-- <?php if (isset($status)) : ?>
        <div class="status"><?php echo $status; ?></div>
    <?php endif; ?> --}}

    <div class="jumbotron">
        <section class="search-sec container">

            <div class="row">
                <div class="col-lg-12 has-search">
                    <form action="search" method="post">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input class="form-control " type="search" name="search" placeholder="Search"
                            aria-label="Search">
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
    </div>

    <div class="container-top container container-card">
        <div class="row">
            <div class="col-md-12">
                <br />
                <h3 align="center">All Students</h3>
                <br />
            </div>
        </div>
        <div class="card-deck row row-table">
            @foreach ($students as $student)

            <div class="col-3">
                <div class="img-container">
                    <img src="{{ $student->profile_picture }}" class="card-img-top stretchy" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $student->firstName }} {{ $student->lastName }}</h5>
                    <p class="card-text">{{ $student->bio }}</p>
                    <p class="card-text"><small class="text-muted">Location here</small></p>
                    <button class="btn btn-primary"><a href="/student/{{ $student->id }}">View
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
    </div>
</body>

</html>
