<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home', app()->getLocale())}}">
        <img src="{{asset('storage/cybridgeasia.png')}}" alt="England Flag" style="width: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @guest
        <ul class="navbar-nav mr-auto ">

            <li class="nav-item active">
                <a class="nav-link" href="{{route('home', app()->getLocale())}}">
                    <i class="fa fa-home"></i>
                    {{ __('Home')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('community.index', app()->getLocale())}}">
                    <i class="fa fa-users"></i>
                    {{ __('Community')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{ route('login', ['locale' => app()->getLocale()]) }}">
                    <i class="fa fa-user"></i>
                    {{ __('Login')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">
                    <i class="fa fa-user"></i>
                    {{ __('Register')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag">
                        <span></span>
                    </i>
                    {{ __('Language')}}
                </a>
                @if(Route::currentRouteName('profile'))
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'en', 'profile' => Auth::user()->id,'community'=>1])}}">
                        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; English
                    </a>
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'jp', 'profile' => Auth::user()->id,'community'=>1])}}">
                        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; Japan
                    </a>
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'vi', 'profile' => Auth::user()->id,'community'=>1])}}">
                        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; VietNam
                    </a>
                </div>
            </li>

        </ul>

        @else
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home', app()->getLocale()) }}">
                    <i class="fa fa-home"></i>
                    {{ __('Home')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>

        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('community.index', app()->getLocale()) }}">
                    <i class="fa fa-users"></i>
                    {{ __('Community')}}
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        @if(Auth::user()->email_verified_at == NULL)

        @else
        <ul class="navbar-nav ">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-bell">
                        <span class="badge badge-info">11</span>
                    </i>
                    Notifications
                </a>
                <div class="dropdown-menu">
                    <p class="dropdown-item">1</p>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <a href="#">
                        <button class="dropdown-item btn-info">All Unread Messages</button>
                    </a>
                </div>
            </li>

        </ul>
        @endif

        <ul class="navbar-nav ">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-user">
                        <span></span>
                    </i>
                    {{__('User')}}
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('profile.show',['locale' => app()->getLocale(),'profile'=>Auth::user()->id]) }}">
                        <p class="dropdown-item"><i class="fas fa-user-tie"></i>&ensp;Profile</p>
                    </a>

                    <a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        <i class="fa fa-user">
                            <span></span>
                        </i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout',app()->getLocale()) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag">
                        <span></span>
                    </i>
                    {{ __('Language')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'en', 'profile' => Auth::user()->id])}}">
                        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; English
                    </a>
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'jp', 'profile' => Auth::user()->id])}}">
                        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; Japan
                    </a>
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), ['locale' => 'vi', 'profile' => Auth::user()->id])}}">
                        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; VietNam
                    </a>
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
