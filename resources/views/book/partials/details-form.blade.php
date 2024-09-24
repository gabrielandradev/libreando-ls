@push('styles')
    <link rel="stylesheet" href="{{ asset('css/book_form.css') }}">
@endpush
<div class="container">
    <form class="book-form" action="{{route('libro_crear')}}" method="POST">
        @csrf
        <h2 class="title">Datos generales</h2>
        <div class="separator"></div>

        <div class="field">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{$book->titulo ?? ''}}" required>
        </div>
        
        <div class="field">
            <div id="authors-container">
                @if (!isset($book))
                    <div class="author-field-group">
                        <label for="autores-1">Autor</label>
                        <input type="text" name="autores[]" id="autores-1" required>
                    </div>
                @else
                    @foreach ($book->authors as $author)
                        <div class="field-group">
                            <label for="autores-{{$author->id}}">Autor</label>
                            <input type="text" name="autores[]" id="autores-{{$author->id}}" value="{{$author->nombre}}" required>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="btn">
            <button type="button" id="add-author">Añadir autor</button>
        </div>
         
        <h2 class="title">Datos de colección</h2>
        <div class="separator"></div>
        <div class="field">
            <label for="ubicacion_fisica">Ubicación física</label>
            <input type="text" name="ubicacion_fisica" id="ubicacion_fisica" value="{{$book->ubicacion_fisica ?? ''}}" required>
        </div>
         
        <h2 class="title">Identificadores únicos</h2>
        <div class="separator"></div>
        <div class="field">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" id="isbn" value="{{$book->isbn ?? ''}}" required>
        </div>
         
        <h2 class="title">Datos de la edición</h2>
        <div class="separator"></div>
        <div class="field">
            <label for="editorial">Editorial</label>
            <input type="text" name="editorial" id="editorial" value="{{$book->editorial ?? ''}}" required>
        </div>
         
        <div class="field">
            <label for="año_edicion">Año de edición</label>
            <input type="number" name="año_edicion" id="año_edicion" value="{{$book->año_edicion ?? ''}}" required>
        </div>
         
        <div class="field">
            <label for="lugar_edicion">Lugar de edición</label>
            <input type="text" name="lugar_edicion" id="lugar_edicion" value="{{$book->lugar_edicion ?? ''}}" required>
        </div>
         
        <div class="field">
            <label for="num_edicion">Número de edición</label>
            <input type="text" name="num_edicion" id="num_edicion" value="{{$book->num_edicion ?? ''}}" required>
        </div>
         
        <div class="field">
            <label for="idioma">Idioma</label>
            <input type="text" name="idioma" id="idioma" value="{{$book->idioma ?? ''}}" required>
        </div>
         
        <div class="field">
            <label for="num_paginas">Número de páginas</label>
            <input type="text" name="num_paginas" id="num_paginas" value="{{$book->num_paginas ?? ''}}" required>
        </div>
         
        <h2 class="title">Descriptores</h2>
        <div class="separator"></div>
        <div class="field">
            <label for="desc_primario">Descriptor primario</label>
            <input type="text" name="desc_primario" id="desc_primario" value="{{$book->desc_primario ?? ''}}" required>
        </div>
         
        <div class="field">
            <div id="desc-container">
                @if (!isset($book))
                    <div class="desc-field-group">
                        <label for="desc_secundario-1">Descriptor secundario</label>
                        <input type="text" name="desc_secundario[]" id="desc_secundario-1" required>
                    </div>
                @else
                    @foreach ($book->secondaryDescs as $secondaryDesc)
                        <div class="field-group">
                            <label for="desc_secundario-{{$secondaryDesc->id}}">Descriptor secundario</label>
                            <input type="text" name="desc_secundario[]" id="desc_secundario-{{$secondaryDesc->id}}" required
                                value="{{$secondaryDesc->descriptor}}">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="btn">
            <button type="button" id="add-desc">
                Añadir descriptor secundario
            </button>
        </div>
         
        <h2 class="title">Datos adicionales</h2>
        <div class="separator"></div>
        <div class="field">
            <label for="notas">Notas</label>
            <textarea name="notas" id="notas" value="{{$book->notas ?? ''}}"></textarea>
        </div>
         
        <h2 class="title">Datos de préstamo</h2>
        <div class="separator"></div>
        <div class="disponibility">
            <label for="disponibilidad">Disponibilidad</label>
            <select name="disponibilidad" id="disponibilidad" required>
            <option value="">Selecciona una opción</option>
            @foreach ($bookAvailabilityStatuses as $statusRecord)
                <option value="{{$statusRecord->estado}}" @selected(($book->id_disponibilidad ?? -1) == $statusRecord->id)>
                    {{ucfirst($statusRecord->estado)}}
                </option>
            @endforeach
            </select>
        </div>
         
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="submit-btn">
            <button type="submit">Enviar</button>
        </div>
    </form>
</div>

<!-- TODO: Refactor onto its own file -->
<script>
    function addFieldAndGetFieldCount(container, fieldName, displayFieldName, fieldCount) {
        const fieldGroup = document.createElement('div');
        fieldGroup.classList.add('field-group');

        fieldGroup.innerHTML = `
                <label for="${fieldName}-${fieldCount}">${displayFieldName}</label>
                <input type="text" name="${fieldName}[]" id="${fieldName}-${fieldCount}">
            `;

        const deleteButton = document.createElement('div');
        deleteButton.classList.add('trash-btn'); 
        deleteButton.onclick = function () {
            fieldGroup.remove();
        };
        deleteButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"/>
                <path d="M9 10h2v8H9zm4 0h2v8h-2z"/>
            </svg>
        `;

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