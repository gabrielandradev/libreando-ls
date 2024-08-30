<x-app-layout>
    <x-auth-session-status :status="session('status')" />
    <h1>Crear nuevo libro</h1>
    <hr>
    <form action="/registrarse/estudiantes" method="POST">
        @csrf
        <h2>Datos generales</h2>
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" required>
        <br>
        <label for="autores">Autores</label>
        <textarea name="autores" id="autores" required></textarea>
        <br>
        <h2>Datos de colección</h2>
        <label for="num_inventario">Número de inventario</label>
        <input type="text" name="num_inventario" id="num_inventario" required>
        <br>
        <label for="ubicacion_fisica">Ubicación física</label>
        <input type="text" name="ubicacion_fisica" id="ubicacion_fisica" required>
        <br>
        <h2>Identificadores únicos</h2>
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" id="isbn" required>
        <br>
        <h2>Datos de la edición</h2>
        <label for="editorial">Editorial</label>
        <input type="text" name="editorial" id="editorial" required>
        <br>
        <label for="año_edicion">Año de edición</label>
        <input type="number" name="año_edicion" id="año_edicion" required>
        <br>
        <label for="lugar_edicion">Lugar de edición</label>
        <input type="text" name="lugar_edicion" id="lugar_edicion" required>
        <br>
        <label for="idioma">Idioma</label>
        <input type="text" name="idioma" id="idioma" required>
        <br>
        <label for="num_paginas">Número de páginas</label>
        <textarea name="num_paginas" id="num_paginas" required></textarea>
        <br>
        <h2>Descriptores</h2>
        <label for="desc_primario">Descriptor primario</label>
        <input type="text" name="desc_primario" id="desc_primario" required>
        <br>
        <label for="desc_secundario">Descriptor secundario</label>
        <input type="text" name="desc_secundario" id="desc_secundario" required>
        <br>
        <h2>Datos adicionales</h2>
        <label for="notas">Notas</label>
        <textarea name="notas" id="notas"></textarea>
        <br>
        <h2>Datos de préstamo</h2>
        <label for="disponibilidad">Disponibilidad</label>
        <select name="disponibilidad" id="disponibilidad" required>
            <option value="">Selecciona una opción</option>
            @foreach ($disponibilidad as $id => $estado)
                <option value="{{$id}}">{{ucfirst($estado)}}</option>
            @endforeach
        </select>
        <br>
        <hr>
        <button type="submit">Crear libro</button>
    </form>
    <style>
        body {
            text-align: center;
        }
    </style>
</x-app-layout>