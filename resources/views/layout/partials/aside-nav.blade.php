<aside class="col-12 col-lg-3">
    <nav class="navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#asideNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <h3 class="navbar-title">Kategórie</h3>
        <button class="btn btn-secondary desktop-hide" data-bs-toggle="modal" data-bs-target="#advanced-search">
            Pokročilé hľadanie
        </button>
        <div class="collapse navbar-collapse" id="asideNav">
            <ul>
                @foreach ($categories as $category)
                    <li class="category"><a href="/category/{{$category->id}}"
                                            title="{{$category->name}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <button class="btn btn-secondary mobile-hide" data-bs-toggle="modal" data-bs-target="#advanced-search">Pokročilé
            hľadanie
        </button>
    </nav>
</aside>
