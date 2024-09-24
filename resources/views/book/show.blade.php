<x-guest-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/book_show.css') }}">
    @endpush

    <div class="admin-view">
        @auth
            @if (auth()->user()->isAdmin())
                <h2>Opciones de administrador</h2>
                <div class="admin-btn">
                    <a id="edit-btn" href="{{route('libro.editar', ['book' => $book])}}">Editar</a>
                    <form action="{{route('libro.destroy', $book->id)}}" method="post">
                        @csrf
                        <button id="delete-btn">Borrar</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <div class="container">
        <div class="book-cover">
            <div class= "cover">
                <img src="{{ asset('images/book/portada.png') }}" alt="Niños en columna">
            </div>
            
            <div class="available-btn">
                <form action="{{route('solicitar.prestamo', $book->id)}}" method="get">
                    @csrf
                    <button type="submit">{{$book->availability->estado}}</button>
                </form>
            </div>
            
            <div class="add-list-btn">
                <button type="submit">AGREGAR A LA LISTA</button>
            </div>
        </div>
        
        <div class="book-info">
            <h1>{{$book->titulo}}</h1>

            <div class="autors">
                @foreach ($book->authors as $author)
                     <a href="{{route('autor', [$author->id])}}">{{$author->nombre}}</a>,
                @endforeach
            </div>

            <div class="description">
                <table>
                    <tr class="primary">
                        <th>TEMA</th>
                        <td>{{$book->desc_primario}}</td>
                    </tr>

                    <tr class="secondary">
                        <th>SUBTEMA</th>
                        <td>
                            <ul>
                                @foreach ($book->secondaryDescs as $secondary_desc)
                                    <a href="#"><li>{{$secondary_desc->descriptor}}</li></a>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="this-edition">
                <h2>SOBRE ESTA EDICIÓN</h2>
                <table>
                    <tr>
                        <th>NUMERO PÁGINAS</th>
                        <td>{{$book->num_paginas}} p.</td>
                    </tr>
                    <tr>
                        <th>IDIOMA</th>
                        <td>{{$book->idioma}}</td>
                    </tr>
                    <tr>
                        <th>UBICACIÓN</th>
                        <td>{{$book->ubicacion_fisica}}</td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>{{$book->isbn}}</td>
                    </tr>
                    <tr>
                        <th>AÑO DE EDICION</th>
                        <td>{{$book->año_edicion}}</td>
                    </tr>
                    <tr>
                        <th>EDITORIAL</th>
                        <td>{{$book->editorial}}</td>
                    </tr>
                    <tr>
                        <th>NOTAS</th>
                        <td>{{$book->notas}}</td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
</x-guest-layout>