<header>
    <nav class="container top-nav">
        <div class="row m-0 align-items-center">
            <a href="{{ url('') }}" class="col-3 logo">
                <img src="{{ asset('assets/logo.svg') }}" alt="Logo">
            </a>
            <div class="col-12 col-md-6">
                <form action="{{ route("search.store") }}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="input-group">
                        <input name="multiple_params" type="search" class="form-control"
                               placeholder="Vyhľadať podľa názvu knihy alebo autora"
                               aria-label="Search"
                               aria-describedby="search-addon"/>
                        <button type="submit" class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-3 buttons">
                @auth
                    <div class="user-name"><i class="fas fa-user"></i>{{ Auth::user()->name }}</div>
                    @if(Auth::user()->hasRole("ADMIN"))
                        <a class="btn btn-secondary" href="/book"><i class="fas fa-book"></i></a>
                    @endif
                <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="btn btn-secondary" href="route('logout')"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </form>
                    <a class="btn btn-secondary" href="{{route('cart.list')}}">
                        <i class="fas fa-shopping-cart"></i>
                        @if(!Auth::check() && !Cart::isEmpty())
                            <span class="badge badge-light">{{ Cart::getTotalQuantity() }}</span>
                        @endif
                    </a>
                @else
                    <a class="btn btn-secondary home-btn" href="{{ url('') }}"><i class="fas fa-home"></i></a>
                    <a class="btn btn-secondary" href="/login">Prihlásiť</a>
                    <a class="btn btn-secondary" href="/register">Registrovať</a>
                    <a class="btn btn-secondary" href="{{route('cart.list')}}">
                        <i class="fas fa-shopping-cart"></i>
                        @if(!Cart::isEmpty())
                            <span class="badge badge-light">{{ Cart::getTotalQuantity()}}</span>
                        @endif
                    </a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="banner" style="background-image: url({{ asset('assets/banner.png') }})"></div>
</header>
