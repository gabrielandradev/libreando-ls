<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @endpush

    <x-navigation-admin/>
    <x-navigation-sidebar/>

    <div class="admin-div">
        <p class="title">Eres admin</p>
        <a href="{{route('libro.crear')}}" class="btn-dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M3 8v11c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19c0-.101.009-.191.024-.273.112-.576.584-.717.988-.727H21V4c0-1.103-.897-2-2-2H6c-1.206 0-3 .799-3 3v3zm3-4h13v12H5V5c0-.806.55-.988 1-1z"></path><path d="M11 14h2v-3h3V9h-3V6h-2v3H8v2h3z"></path></svg>
            Crear nuevo libro
        </a>
    
        <a href="{{route('estudiantes_pendientes')}}" class="btn-dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path></svg>
            Cuentas de estudiantes<br>
            por aprobar
        </a>
    
        <a href="{{route('profesores_pendientes')}}" class="btn-dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5zM19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2z"></path></svg>
            Cuentas de profesores<br>
            por aprobar
        </a>
    
        <a href="{{route('gestionar.solicitudes.prestamo')}}" class="btn-dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm-1 4v2h-5V7h5zm-5 4h5v2h-5v-2zM4 19V5h7v14H4z"></path></svg>
            Gestionar solicitudes<br>
            de prestamo
        </a>
    
        <a href="#" class="btn-dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M13 14v-3h3V9h-3V6h-2v3H8v2h3v3z"></path><path d="M20 22V4c0-1.103-.897-2-2-2H6c-1.103 0-2 .897-2 2v18l8-4.572L20 22zM6 10V4h12v14.553l-6-3.428-6 3.428V10z"></path></svg>
            Crear nuevo préstamo
        </a>
        <form method="POST" action="{{ route('logout') }}">
                @csrf
    
            <a href="route('logout')" onclick="event.preventDefault();
                this.closest('form').submit();" class="btn-dashboard-logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>
                Cerrar sesion
            </a>
        </form>
    </div>

</x-app-layout>