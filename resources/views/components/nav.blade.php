<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('images/rocket.png') }}" width="30" height="30" class="d-inline-block align-top" alt="IMDbuddy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @auth
                    @if(!empty(session('name')))
                    <b>{{ session('name') }}</b>
                    @endif
                    @endauth
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/users/{{ session('uid') }}">View profile</a>
                    <a class="dropdown-item" href="/users/edit/{{ session('uid') }}">Edit profile</a>
                    <a class="dropdown-item" href="/user/logout">Log out</a>
                </div>

            </li>
        </ul>
    </div>
</nav>