<nav>
    <div class="topnav">
        <a href="{{route('dashboard')}}">
            <img src="{{asset('images/logo/logo-libreando.png')}}" alt="Logo">
        </a>
        <div class="search-container">
            <form action="/action_page.php">
                <div class="search-selector">
                    <select name="items">
                        <option value="todos" selected>Todos</option>
                        <option value="libros">Libros</option>
                        <option value="autores">Autores</option>
                    </select>
                </div>
                <input type="text" placeholder="Busca libros, autores, o temas" name="search">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" height="36px" width="36px" viewBox="0 -960 960 960"
                        fill="#e8eaed">
                        <path
                            d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                    </svg>
                </button>
            </form>
        </div>

        @guest
            <div class="user-links">
                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                <a class="nav-link" href="{{ route('registrarse') }}">Registrarse</a>
            </div>

        @endguest

        <div @class(['menu-icon', 'menu-icon-active' => Auth::check()])>
            <button class="menu-toggle">
                <img src="{{asset('images/icons/user.png')}}" alt="Logo">
            </button>
        </div>


        @auth
            <div class="dropdown-menu">
                <a class="nav-link" href="{{ route('registrarse') }}">Mis Datos</a>
                <a class="nav-link" href="{{ route('registrarse') }}">Mis Prestamos</a>
                <a class="nav-link" href="{{ route('registrarse') }}">Mi Lista</a>
                <a class="nav-link" href="{{ route('registrarse') }}">Configuración</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="route('logout')" onclick="event.preventDefault();
                    this.closest('form').submit();" class="nav-link">
                        Cerrar sesion
                    </a>
                </form>
            </div>
        @endauth
        @guest
            <div class="dropdown-menu">
                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                <a class="nav-link" href="registrarse">Registrarse</a>
            </div>
        @endguest
    </div>
</nav>

<script>
    const menuToggle = document.querySelector('.menu-toggle');
    const menuIcon = document.querySelector('.menu-icon');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    menuToggle.addEventListener('click', function () {
        menuIcon.classList.toggle('active');
        dropdownMenu.classList.toggle('show');
    });    
</script>