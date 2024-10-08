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
                        <h1>¡Bienvenido, estudiante!</h1>
                    </div>

<!-- ----------------------------------------------------------- -->
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
<!-- ----------------------------------------------------------- -->

                    <div class="user-login">
                        <label for="año"></label>

                        <select type="text" name="año" id="año" value="{{ old('año') }}" required
                            autofocus autocomplete="año">
                            <option value="" disabled selected>Año</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <x-input-error :messages="$errors->get('año')" />
                    </div>

                    <div class="user-login">
                        <label for="division"></label>

                        <input type="text" name="division" id="division" placeholder="Division"
                            value="{{ old('division') }}" required autocomplete="division">

                        <x-input-error :messages="$errors->get('division')" />
                    </div>

                    <div class="user-login">
                        <label for="turno"></label>

                        <select type="text" name="turno" id="turno" value="{{ old('turno') }}"
                            required autocomplete="turno">
                            <option value="" disabled selected>Turno</option>
                            <option value="mañana">Mañana</option>
                            <option value="tarde">Tarde</option>
                        </select>
                        <x-input-error :messages="$errors->get('turno')" />
                    </div>

                    <div class="user-login">
                        <label for="especialidad"></label>

                        <select type="especialidad" name="especialidad" id="especialidad"
                            value="{{ old('especialidad') }}" required autocomplete="especialidad">
                            <option value="" disabled selected>Especialidad</option>
                            <option value="construcciones">Construcciones</option>
                            <option value="computacion">Computación</option>
                            <option value="electrica">Electrica</option>
                            <option value="electronica">Electronica</option>
                            <option value="quimica">Quimica</option>
                            <option value="mecanica">Mecánica</option>
                        </select>
                        <x-input-error :messages="$errors->get('especialidad')" />
                    </div>

                    <div class="user-login">
                        <label for="email"></label>

                        <input type="email" name="email" id="email" placeholder="Correo Electrónico"
                            value="{{ old('email') }}" required autocomplete="username">

                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="user-login">
                        <label for="email"></label>

                        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required
                            autocomplete="current-password">

                        <x-input-error :messages="$errors->get('contraseña')" />
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