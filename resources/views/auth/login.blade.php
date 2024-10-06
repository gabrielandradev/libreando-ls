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
            <div class= "childrens">
                <img src="{{ asset('images/login/niños_pila.png') }}" alt="Niños en columna">
            </div>
        </section>

        <section class="main">
            <div class="loginbox">
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <div class="login-header">
                        <h1>¡Bienvenido de nuevo!</h1>
                    </div>

                    <div class= "user-login">
                        <label for="email"></label>
                        
                        <input type="email" name="email" id="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required autofocus
                            autocomplete="username">

                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="user-login">
                        <label for="email"></label>

                        <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required autocomplete="current-password">

                        <x-input-error :messages="$errors->get('contraseña')" />
                    </div>

                    <div class="remember">
                        <label for="remember-me">
                            <input id="remember-me" type="checkbox" name="remember" />
                            <span>Recordarme la proxima vez</span>
                        </label>
                    </div>

                    <div class="login-btn">
                        <button type="submit">Iniciar sesion</button>
                    </div>
        
                    <div class="forgot">            
                        @if (Route::has('password.request'))
                            <a id="forgot_password"
                                href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>
                    <div class="signup">
                        <p>¿Todavia no tienes cuenta? <a href="{{ route('registrarse') }}">Regístrate</a></p>
                    </div>
                </form>
            </div>
        </section>


    </div>
</x-guest-layout>