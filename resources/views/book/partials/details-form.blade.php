<form action="{{route('libro_crear')}}" method="POST">
    @csrf
    <h2>Datos generales</h2>
    <label for="titulo">Título</label>
    <input type="text" name="titulo" id="titulo" value="{{$book->titulo ?? ''}}" required>
    <br>
    <div id="authors-container">
        @if (!isset($book))
            <div class="author-field-group">
                <label for="autores-1">Autor</label>
                <input type="text" name="autores[]" id="autores-1" required>
            </div>
        @else
            @foreach ($book->authors as $author)
                <div class="author-field-group">
                    <label for="autores-{{$author->id}}">Autor</label>
                    <input type="text" name="autores[]" id="autores-{{$author->id}}" value="{{$author->nombre}}" required>
                </div>
            @endforeach
        @endif
    </div>
    <button type="button" id="add-author">Añadir otro autor</button>
    <br>
    <h2>Datos de colección</h2>
    <label for="ubicacion_fisica">Ubicación física</label>
    <input type="text" name="ubicacion_fisica" id="ubicacion_fisica" value="{{$book->ubicacion_fisica ?? ''}}" required>
    <br>
    <h2>Identificadores únicos</h2>
    <label for="isbn">ISBN</label>
    <input type="text" name="isbn" id="isbn" value="{{$book->isbn ?? ''}}" required>
    <br>
    <h2>Datos de la edición</h2>
    <label for="editorial">Editorial</label>
    <input type="text" name="editorial" id="editorial" value="{{$book->editorial ?? ''}}" required>
    <br>
    <label for="año_edicion">Año de edición</label>
    <input type="number" name="año_edicion" id="año_edicion" value="{{$book->año_edicion ?? ''}}" required>
    <br>
    <label for="lugar_edicion">Lugar de edición</label>
    <input type="text" name="lugar_edicion" id="lugar_edicion" value="{{$book->lugar_edicion ?? ''}}" required>
    <br>
    <label for="num_edicion">Número de edición</label>
    <input type="text" name="num_edicion" id="num_edicion" value="{{$book->num_edicion ?? ''}}" required>
    <br>
    <label for="idioma">Idioma</label>
    <input type="text" name="idioma" id="idioma" value="{{$book->idioma ?? ''}}" required>
    <br>
    <label for="num_paginas">Número de páginas</label>
    <input type="text" name="num_paginas" id="num_paginas" value="{{$book->num_paginas ?? ''}}" required>
    <br>
    <h2>Descriptores</h2>
    <label for="desc_primario">Descriptor primario</label>
    <input type="text" name="desc_primario" id="desc_primario" value="{{$book->desc_primario ?? ''}}" required>
    <br>
    <div id="desc-container">
        @if (!isset($book))
            <div>
                <label for="desc_secundario-1">Descriptor secundario</label>
                <input type="text" name="desc_secundario[]" id="desc_secundario-1" required>
            </div>
        @else
            @foreach ($book->secondaryDescs as $secondaryDesc)
                <div>
                    <label for="desc_secundario-{{$secondaryDesc->id}}">Descriptor secundario</label>
                    <input type="text" name="desc_secundario[]" id="desc_secundario-{{$secondaryDesc->id}}" required
                        value="{{$secondaryDesc->descriptor}}">
                </div>
            @endforeach
        @endif
    </div>
    <button type="button" id="add-desc">
        Añadir otro descriptor secundario
    </button>
    <br>
    <h2>Datos adicionales</h2>
    <label for="notas">Notas</label>
    <textarea name="notas" id="notas" value="{{$book->notas ?? ''}}"></textarea>
    <br>
    <h2>Datos de préstamo</h2>
    <label for="disponibilidad">Disponibilidad</label>
    <select name="disponibilidad" id="disponibilidad" required>
        <option value="">Selecciona una opción</option>
        @foreach ($disponibilidad as $id => $estado)
            <option value="{{$id}}" @selected(($book->id_disponibilidad ?? -1) == $id)>
                {{ucfirst($estado)}}
            </option>
        @endforeach
    </select>
    <br>
    <hr>
    <button type="submit">Enviar</button>
</form>

<!-- TODO: Refactor onto its own file -->
<script>
    function addFieldAndGetFieldCount(container, fieldName, displayFieldName, fieldCount) {
        const fieldGroup = document.createElement('div');

        fieldGroup.innerHTML = `
                <label for="${fieldName}-${fieldCount}">${displayFieldName}</label>
                <input type="text" name="${fieldName}[]" id="${fieldName}-${fieldCount}">
            `;

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Eliminar';
        deleteButton.type = 'button';
        deleteButton.onclick = function () {
            fieldGroup.remove();
        };

        fieldGroup.appendChild(deleteButton);
        container.append(fieldGroup);

        return fieldCount + 1;
    }

    const authorsContainer = document.getElementById("authors-container");
    const addAuthorButton = document.getElementById("add-author");
    let authorCount = 2;

    addAuthorButton.addEventListener("click", function () {
        authorCount = addFieldAndGetFieldCount(authorsContainer, "autores", "Autor", authorCount);
    });

    const secondaryDescContainer = document.getElementById("desc-container");
    const addDescButton = document.getElementById("add-desc");
    let descCount = 2;

    addDescButton.addEventListener("click", function () {
        descCount = addFieldAndGetFieldCount(secondaryDescContainer, "desc_secundario", "Descriptor Secundario", descCount);
    });
</script>