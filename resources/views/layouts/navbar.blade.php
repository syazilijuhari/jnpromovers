<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/jnpro-logo.png') }}" alt="JN Pro Logo"
                 class="brand-image img-circle" style="width: 28px;">
            <span class="brand-text font-weight-bold">JN Pro Movers</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('gallery')}}" class="nav-link ">Gallery</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('service.index')}}" class="nav-link ">Service</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('about')}}" class="nav-link ">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('contact')}}" class="nav-link ">Contact</a>
                </li>
            </ul>

            <button class="button-81" role="button">Booking</button>

            @auth
                <ul class="navbar-nav ml-auto">
                    @if(Route::has('login'))
                        @auth
                            <div class="info">
                                @if ( Auth::user()->role == 'admin')
                                    <a href="" class="d-block" style="color: white"> {{ ucfirst(Auth::user()->name) }} </a>

                                @else
                                    <a href="#" class="d-block" style="color: white"> {{ ucfirst(Auth::user()->name) }} </a>

                                @endif

                            </div>
                        @else
                            <div class="info">
                                <a href="#" class="d-block"> Guest </a>
                            </div>
                        @endauth
                    @endif
                    @if(Route::has('login'))
                            @if(Auth::user()->role == "customer")
                                <li class="ml-2 nav-item">
                                    <a href="{{ route('customer.logout') }}" id="logout-btn" class="nav-link">Logout</a>
                                </li>

                            @elseif(Auth::user()->role == "admin")
                                <li class="ml-2 nav-item">
                                    <a href="{{ route('admin.logout') }}" id="logout-btn" class="nav-link">Logout</a>
                                </li>
                            @endif
                    @endif
                </ul>

            @else
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" id="login-btn" class="nav-link">Login</a>
                    </li>
                    <li class="ml-2 nav-item">
                        <a href="{{ route('register') }}" id="register-btn" class="nav-link">Register</a>
                    </li>
                </ul>
            @endauth
        </div>

    </div>
</nav>
