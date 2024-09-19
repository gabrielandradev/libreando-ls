<x-app-layout>
    <p>Eres admin</p>
    <a href="{{route('libro_crear')}}">Crear nuevo libro</a>
    <a href="{{route('estudiantes_pendientes')}}">Cuentas de estudiantes por aprobar</a>
    <a href="{{route('profesores_pendientes')}}">Cuentas de profesores por aprobar</a>
</x-app-layout>