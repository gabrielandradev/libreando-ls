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


    <div class="books">
        <h2>Todos los libros</h2>
        @foreach ($books as $book)
            <ul>
                <li>
                    <a href="{{route('libro', [$book->id])}}">{{$book->titulo}}</a>
                </li>
            </ul>
        @endforeach
    </div>
</x-guest-layout>