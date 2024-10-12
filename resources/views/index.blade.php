<x-guest-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @endpush
    
    <div class="container">
        <div class="content">
            <div class="tittle">
                <h2>Mar-Team presenta</h2>
                <h1>Proyecto<br>Biblioteca</h1>
            </div>
            <div class="text">
                <p>Descubre nuestra amplia <br>
                    colección de libros, desde <br>
                    clásicos y novelas hasta <br>
                    textos técnicos y <br>
                    especializados. <br>
                </p>
            </div>
        </div>
        <div class="image">
            <img src="{{ asset('images/index/niños_grupo.png') }}" > </img>
        </div>
    </div>

    <div class="container-bottom">
        <div class="image-bottom">
            <img src="{{ asset('images/index/niños_grupo_2.png') }}" > </img>
        </div>
        <div class="text-bottom">
                <p>Navega por nuestra colección, <br>
                    explora las diferentes<br>
                    categorías y encuentra el<br>
                    libro perfecto para ti. Pídelo<br>
                    ahora en nuestra biblioteca y<br>
                    comienza tu viaje de lectura<br>
                    hoy mismo
                </p>
        </div>
    </div>


    <div class="books">
        <h2>Todos los libros</h2>
        <svg class="left-btn" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
        <ul class="books-slider">
            @foreach ($books as $book)
                <li class="book-container">
                    <a href="{{route('libro', [$book->id])}}" draggable="false"><img src="{{ asset('images/book/portada.png') }}" alt="Portada" class="book-img" draggable="false">{{$book->titulo}}</a>
                </li>
            @endforeach
        </ul>
        <svg class="right-btn" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
    </div>
 </div>

<script src="{{ asset('js\index.js') }}"></script>
</x-guest-layout>