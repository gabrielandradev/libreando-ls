<x-guest-layout>
    <a href="{{route('secreto')}}">Test de autenticacion</a>
    <br>
    <a href="{{route('registrarse')}}">Registrarse</a>
    <br>
    <a href="{{route('login')}}">Iniciar sesion</a>
    <br>
    @if (auth()->check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="route('logout')" onclick="event.preventDefault();
                this.closest('form').submit();">
                Cerrar sesion
            </a>
        </form>
    @endif
    @if (auth()->check())
        @if (auth()->user()->hasRole('administrador'))
            <p>Eres admin</p>
            <a href="{{route('libro_crear')}}">Crear nuevo libro</a>
            <a href="{{route('solicitudes_activacion_cuenta')}}">Cuentas por aprobar</a>
        @else
            <p>Eres usuario estandar</p>
        @endif
    @endif

    <h2>Todos los libros</h2>
    @foreach ($books as $book)
        <ul>
            <li>
                <a href="{{route('libro', [$book->id])}}">{{$book->titulo}}</a>
            </li>
        </ul>
    @endforeach
</x-guest-layout>