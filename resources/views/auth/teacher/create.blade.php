<x-guest-layout>
    <x-auth-session-status :status="session('status')" />

    <form action="/registrarse/profesores" method="POST">
        @csrf
        Nombre: <input type="text" name="nombre" value="{{ old('title') }}"><br>
        Apellido: <input type="text" name="apellido" value="{{ old('title') }}"><br>
        DNI: <input type="text" name="dni" value="{{ old('title') }}"><br>
        E-mail: <input type="email" name="email" value="{{ old('title') }}"><br>
        Contraseña: <input type="password" name="contraseña" autocomplete="new-password"><br>
        Telefono: <input type="text" name="telefono" value="{{ old('title') }}"><br>
        Especialidad: <input type="text" name="especialidad" value="{{ old('title') }}"><br>
        Domicilio: <input type="text" name="domicilio" value="{{ old('title') }}"><br>
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