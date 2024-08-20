<x-guest-layout>
    <x-auth-session-status :status="session('status')" />

    <form action="/registrarse/estudiantes" method="POST">
        @csrf
        Nombre: <input type="text" name="nombre" value="{{ old('title') }}"><br>
        Apellido: <input type="text" name="apellido" value="{{ old('title') }}"><br>
        DNI: <input type="text" name="dni" value="{{ old('title') }}"><br>
        E-mail: <input type="email" name="email" value="{{ old('title') }}"><br>
        Contraseña: <input type="password" name="contraseña" autocomplete="new-password"><br>
        Telefono: <input type="text" name="telefono" value="{{ old('title') }}"><br>
        Año: <select name="año" value="{{ old('title') }}" required>
            <option value="">--Elije una opcion--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br>
        División: <input type="text" name="division" value="{{ old('title') }}"><br>
        Especialidad: <select name="especialidad" value="{{ old('title') }}" required>
            <option value="">--Elije una opcion--</option>
            <option value="construcciones">Construcciones</option>
            <option value="computacion">Computación</option>
            <option value="electrica">Electrica</option>
            <option value="electronica">Electronica</option>
            <option value="quimica">Quimica</option>
            <option value="mecanica">Mecánica</option>
        </select><br>
        Turno:<select name="turno" value="{{ old('title') }}">
            <option value="">--Elije una opcion--</option>
            <option value="mañana">Mañana</option>
            <option value="tarde">Tarde</option>
        </select><br>
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