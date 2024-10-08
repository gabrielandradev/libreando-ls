<x-guest-layout>

    <x-auth-session-status :status="session('status')" />

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endpush

    <div class="container">
        <a class="logo" href="{{route('dashboard')}}">
            <img src="{{asset('images/logo/logo-libreando.png')}}" alt="Logo">
        </a>
        <section class="side">
            <div class="childrens">
                <img src="{{ asset('images/login/niños_pila.png') }}" alt="Niños en columna">
            </div>
        </section>

        <section class="main">
            <div class="loginbox">

                <div class="user-login">
                    <h1>Registrarse como:</h1>
                </div>

                <div class="login-btn">
                    <button>
                        <a href="{{route('registrar-profesor')}}">Profesores</a>
                    </button>
                </div>

                <div class="login-btn">
                    <button>
                        <a href="{{route('registrar-estudiante')}}">Estudiantes</a>
                    </button>
                </div>
            </div>
        </section>
    </div>


</x-guest-layout>