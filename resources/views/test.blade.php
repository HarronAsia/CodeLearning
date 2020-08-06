
<ul class="navbar-nav ">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-flag">
                        <span></span>
                    </i>
                    {{ __('Language')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), 'en')}}">
                        <img src="{{asset('storage/flag/england.png')}}" alt="England Flag" style="width: 35px;"> &ensp; English
                    </a>
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), 'jp')}}">
                        <img src="{{asset('storage/flag/japan.png')}}" alt="Japanese Flag" style="width: 35px;"> &ensp; Japan
                    </a>
                    <a class="dropdown-item" href="{{route(Route::currentRouteName(), 'vi')}}">
                        <img src="{{asset('storage/flag/vietnam.png')}}" alt="Vietnamese Flag" style="width: 35px;"> &ensp; VietNam
                    </a>
                </div>
            </li>
        </ul>