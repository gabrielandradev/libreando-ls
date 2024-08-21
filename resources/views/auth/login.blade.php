<x-guest-layout>
    
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Correo Electronico</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                autocomplete="username">
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div>
            <label for="email">Contraseña</label>

            <input type="password" name="contraseña" id="contraseña" required autocomplete="current-password">

            <x-input-error :messages="$errors->get('contraseña')" />
        </div>

        <div>
            <label for="remember-me">
                <input id="remember-me" type="checkbox" name="remember" />
                <span>Recordarme la proxima vez</span>
            </label>
        </div>

        <div>
            @if (Route::has('password.request'))
                <a
                    href="{{ route('password.request') }}">
                    Olvidaste tu contrasena?
                </a>
            @endif

            <button type="submit">Iniciar sesion</button>
        </div>
    </form>
</x-guest-layout>