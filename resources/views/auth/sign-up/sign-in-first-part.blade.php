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
                <form action="/registrarse/estudiantes" method="POST" class="login-form">
                    @csrf
                    <div class="login-header">
                        <h1>¡Bienvenido!</h1>
                    </div>

                    <div class="user-login">
                        <label for="nombre"></label>

                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required autofocus autocomplete="nombre">

                        <x-input-error :messages="$errors->get('nombre')" />
                    </div>
                    <div class="user-login">
                        <label for="apellido"></label>

                        <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="{{ old('apellido') }}" required autofocus autocomplete="apellido">

                        <x-input-error :messages="$errors->get('apellido')" />
                    </div>
                    <div class="user-login">
                        <label for="DNI"></label>

                        <input type="text" name="dni" id="dni" placeholder="DNI" value="{{ old('dni') }}" required autofocus autocomplete="dni">

                        <x-input-error :messages="$errors->get('dni')" />
                    </div>
                    <div class="user-login">
                        <label for="domicilio"></label>

                        <input type="text" name="domicilio" id="domicilio" placeholder="Domicilio" value="{{ old('domicilio') }}" required autofocus autocomplete="domicilio">

                        <x-input-error :messages="$errors->get('domicilio')" />
                    </div>
                    <div class="user-login">
                        <label for="telefono"></label>

                        <input type="text" name="telefono" id="telefono" placeholder="Telefono" value="{{ old('telefono') }}" required autofocus autocomplete="telefono">

                        <x-input-error :messages="$errors->get('nombre')" />
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="login-btn">
                        <button type="submit">Registrarse</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

</x-guest-layout>