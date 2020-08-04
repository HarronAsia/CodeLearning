<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @guest
        <ul class="navbar-nav mr-auto ">

            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fa fa-home"></i>
                    Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/login') }}">
                    <i class="fa fa-user"></i>
                    Login
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{ url('/register') }}">
                    <i class="fa fa-user"></i>
                    Register
                    <span class="sr-only">(current)</span>
                </a>
            </li>

        </ul>

        @else
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fa fa-home"></i>
                    Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>

        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="#">

                </a>
            </li>
            <li class="nav-item dropdown ">

                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-bell">
                        <span class="badge badge-info">11</span>
                    </i>
                    Notifications
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ">
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-user"></i>&ensp;{{ucfirst(Auth::user()->name)}}
                </a>

                <div class="dropdown-menu">
                    <a href="{{route('profile.show',['profile'=>Auth::user()->id])}}">
                        <p class="dropdown-item"><i class="fas fa-user-tie"></i>&ensp;Profile</p>
                    </a>

                    <button type="submit" class="dropdown-item" style="background-color: red;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>&ensp;Log Out
                    </button>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        @endif
    </div>
</nav>