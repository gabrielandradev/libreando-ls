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
        <div class="books-slider">
            @foreach ($books as $book)

                <a href="{{route('libro', [$book->id])}}"><img src="{{ asset('images/book/portada.png') }}" alt="Portada" class="cover">  {{$book->titulo}}</a>
             
            @endforeach
        </div>
    </div>
 </div>
</x-guest-layout>