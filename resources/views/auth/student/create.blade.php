<x-guest-layout>
    <x-auth-session-status :status="session('status')" />
    <h2>Registrar estudiante</h2>
    <form action="/registrarse/estudiantes" method="POST">
        @csrf
        Nombre<input type="text" name="nombre" value="{{ old('nombre') }}"><br>
        Apellido<input type="text" name="apellido" value="{{ old('apellido') }}"><br>
        DNI<input type="text" name="dni" value="{{ old('dni') }}"><br>
        Mail<input type="email" name="email" value="{{ old('email') }}"><br>
        Crea una contraseña<input type="password" name="contraseña" autocomplete="new-password"><br>
        Telefono<input type="text" name="telefono" value="{{ old('telefono') }}"><br>
        Año<select name="año" value="{{ old('año') }}" required>
            <option value="">--Elige una opción--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br>
        División<input type="text" name="division" value="{{ old('division') }}"><br>
        Especialidad<select name="especialidad" value="{{ old('especialidad') }}" required>
            <option value="">--Elige una opción--</option>
            <option value="construcciones">Construcciones</option>
            <option value="computacion">Computación</option>
            <option value="electrica">Electrica</option>
            <option value="electronica">Electronica</option>
            <option value="quimica">Quimica</option>
            <option value="mecanica">Mecánica</option>
        </select><br>
        Turno<select name="turno" value="{{ old('turno') }}">
            <option value="">--Elige una opción--</option>
            <option value="mañana">Mañana</option>
            <option value="tarde">Tarde</option>
        </select><br>
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