<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('images/rocket.png') }}" width="30" height="30" class="d-inline-block align-top"
            alt="IMDbuddy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form action="/search" method="POST" class="form-inline my-2 my-lg-0 ml-auto has-search">
            {{ csrf_field() }}
            <span class="fa fa-search form-control-feedback"></span>
            <input class="form-control " type="search" name="search" placeholder="Zoek" aria-label="Search">
        </form>
        <div class="mr-auto"></div>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li><li class="nav-item active">
                <a class="nav-link" href="/all-users">Alle studenten</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/buddies">Buddies</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/requests">Verzoeken
                    @if (\App\Friend::newFriendCount() > 0)
                    <span class="redBadge">
                        {{ \App\Friend::newFriendCount() }}
                    </span>
                    @endif
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="/uploads/avatars/{{ Auth::user()->profile_picture }}" alt="" class="img-nav">
                    @auth
                    <b>{{ Auth::user()->name }}</b>
                    @endauth
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/users/{{ session('uid') }}">Bekijk profiel</a>
                    <a class="dropdown-item" href="/users/edit/{{ session('uid') }}">Bewerk profiel</a>
                    <a class="dropdown-item" href="/user/logout">Log uit</a>
                </div>

            </li>
        </ul>
    </div>
</nav>