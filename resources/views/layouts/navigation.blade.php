<nav x-data="{ open: false }" class="bg-white border-b border-gray-100" style="background-color: #E19F2E;">
    <!-- navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href={{ route('vehicules.index')}}><img src={{ url('images/ceet_logo.png')}} class="mr-2" alt="logo" style="width: 50px; height: auto;" /></a>
            <a class="navbar-brand brand-logo-mini" href={{ route('vehicules.index')}}>CEET</a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            <span class="input-group-text" id="search">
                                <i class="icon-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Recherche" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li>
                </li>
            </ul>
            <ul>
                <li class="nav-item nav-search d-none d-lg-block">
                    <a href="{{ route('logout') }}" class="nav-link" style="color:black; margin-top:15px"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>

        </div>
    </nav>
    <!-- navbar -->
</nav>