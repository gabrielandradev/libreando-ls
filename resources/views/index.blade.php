<x-guest-layout>
    <a href="{{route('secreto')}}">Test de autenticacion</a>
    <br>
    <a href="{{route('registrarse')}}">Registrarse</a>
    <br>
    <a href="{{route('login')}}">Iniciar sesion</a>
    <br>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a href="route('logout')"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            Cerrar sesion
        </a>
    </form>
    @if (auth()->check())
        @if (auth()->user()->isAdmin())
        Eres admin
        @else
        Eres usuario estandar
        @endif
    @endif
</x-guest-layout>