<x-guest-layout>
    <x-auth-session-status :status="session('status')" />
    <h2>Registrar profesor</h2>
    <form action="/registrarse/profesores" method="POST">
        @csrf
        Nombre<input type="text" name="nombre" value="{{ old('nombre') }}"><br>
        Apellido<input type="text" name="apellido" value="{{ old('apellido') }}"><br>
        DNI sin puntos ni espacios<input type="text" name="dni" value="{{ old('dni') }}"><br>
        Mail cuenta @bue.edu.ar<input type="email" name="email" value="{{ old('email') }}"><br>
        Contraseña<input type="password" name="contraseña" autocomplete="new-password"><br>
        Teléfono<input type="text" name="telefono" value="{{ old('telefono') }}"><br>
        Especialidad<input type="text" name="especialidad" value="{{ old('especialidad') }}"><br>
        Domicilio<input type="text" name="domicilio" value="{{ old('domicilio') }}"><br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit">Registrarse</button>
    </form>

</x-guest-layout>