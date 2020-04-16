<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop.products.index') }}">Товари</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <form class="form-inline my-2 my-lg-0" role="search" method="POST" action="{{route('search')}}">
                   @csrf
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search"
                           aria-label="Search" minlength="3" required maxlength="200">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </div>
</nav>
