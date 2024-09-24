<x-app-layout>
    <p>Eres admin</p>
    <a href="{{route('libro.crear')}}">Crear nuevo libro</a>
    <a href="{{route('estudiantes_pendientes')}}">Cuentas de estudiantes por aprobar</a>
    <a href="{{route('profesores_pendientes')}}">Cuentas de profesores por aprobar</a>
    <a href="{{route('gestionar.solicitudes.prestamo')}}">Gestionar solicitudes de prestamo</a>
    <a href="#">Crear nuevo préstamo</a>
    <form method="POST" action="{{ route('logout') }}">
            @csrf

        <a href="route('logout')" onclick="event.preventDefault();
            this.closest('form').submit();">
            Cerrar sesion
        </a>
    </form>
</x-app-layout>