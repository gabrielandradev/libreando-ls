<x-guest-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @endpush
    
    @if (auth()->check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="route('logout')" onclick="event.preventDefault();
                this.closest('form').submit();">
                Cerrar sesion
            </a>
        </form>
    @endif
    <div class="container">
        <div class="content">
            <div class="tittle">
                <h2>Mar-Team presenta</h2>
                <h1>Proyecto</h1>
                <h1>Biblioteca</h1>
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



    <h2>Todos los libros</h2>
    @foreach ($books as $book)
        <ul>
            <li>
                <a href="{{route('libro', [$book->id])}}">{{$book->titulo}}</a>
            </li>
        </ul>
    @endforeach
</x-guest-layout>