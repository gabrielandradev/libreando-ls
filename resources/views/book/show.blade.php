<x-guest-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/book_show.css') }}">
    @endpush

    <div class="container">
        <div class="book-cover">
            <div class= "cover">
                <img src="{{ asset('images/book/portada.png') }}" alt="Niños en columna">
            </div>
            
            <div class="available-btn">
                <button type="submit">DISPONIBLE</button>
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

            <h2>Descriptores Secundarios</h2>
            <ul>
                @foreach ($book->secondaryDescs as $secondary_desc)
                    <li>{{$secondary_desc->descriptor}}</li>
                @endforeach
            </ul>
        </div>
    </div>

    
    

    @if (auth()->check())
        @if (auth()->user()->role->nombre == 'administrador')
            <a href="{{route('libro_editar', ['book' => $book])}}">Editar</a>
            <a href="{{route('libro_borrar', ['book' => $book])}}">Borrar</a>
        @endif
    @endif
</x-guest-layout>