<header>
    <div class="container top-nav">
        <div class="row m-0 align-items-center">
            <a href="index.html" class="col-3 logo">
                <img src="{{ asset('assets/logo.svg') }}" alt="Logo" width="70px" height="70px">
            </a>
            <div class="col-12 col-md-6">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Vyhľadať poďla názvu knihy, autora alebo žánru" aria-label="Search"
                           aria-describedby="search-addon"/>
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
            <div class="col-12 col-md-3 buttons">
                <a class="btn btn-secondary home-btn" href="index.html"><i class="fas fa-home"></i></a>
                <button data-bs-toggle="modal" data-bs-target="#login" class="btn btn-secondary">Prihlásiť</button>
                <button data-bs-toggle="modal" data-bs-target="#register" class="btn btn-secondary">Registrovať</button>
                <a class="btn btn-secondary" href="shopping-cart.html"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </div>
    <div class="banner" style="background-image: url({{ asset('assets/banner.png') }})"></div>
</header>
