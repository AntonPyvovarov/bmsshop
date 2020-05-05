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
                    <a class="nav-link" href="{{ route('delivery') }}">Доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Обратная связь</a>
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
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (!Auth::guest() && Auth::user()->admin)
                                <a class="dropdown-item" href="{{ route('shop.admin.category.create') }}">
                                    Создать Категорию
                                </a>
                                <a class="dropdown-item" href="{{ route('shop.admin.product.create') }}">
                                    Создать Карточку Товара
                                </a>
                                @else
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        home
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
