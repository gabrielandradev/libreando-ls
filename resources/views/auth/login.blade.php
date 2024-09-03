<x-guest-layout>
    
    <x-auth-session-status :status="session('status')" />

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div>
        <img id="childrens" src="{{ asset('images/login/niños_pila.png') }}">
    </div>

    <div class="loginbox">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <h1>¡Bienvenido de nuevo!</h1>
            </div>

            <div class= "user">
                <label for="email"></label>
                
                <input type="email" name="email" id="email" placeholder="Correo Electronico" value="{{ old('email') }}" required autofocus
                    autocomplete="username">

                <x-input-error :messages="$errors->get('email')" />
            </div>

            <div class="user">
                <label for="email"></label>

                <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required autocomplete="current-password">

                <x-input-error :messages="$errors->get('contraseña')" />
            </div>

            <div>
                <label for="remember-me">
                    <input id="remember-me" type="checkbox" name="remember" />
                    <span>Recordarme la proxima vez</span>
                </label>
            </div>

            <button id="button" type="submit">Iniciar sesion</button>
            <div class="signup">            
                @if (Route::has('password.request'))
                    <a id="forgot_password"
                        href="{{ route('password.request') }}">
                        Recordar contraseña
                    </a>
                @endif
            </div>
            <div class="signup">
                ¿Todavia no tienes cuenta? <a href="{{ route('registrarse') }}">Regístrate</a>
            </div>
        </form>
    </div>
</x-guest-layout>