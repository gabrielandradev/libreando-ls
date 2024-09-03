<x-guest-layout>
    <h1>{{$author->nombre}}</h1>
    <h2>Libros de este autor</h2>
    <ul>
        @foreach ($author->books as $author_book)
            <li><a href="{{route('libro', [$author_book->id])}}">{{$author_book->titulo}}</a></li>
        @endforeach
    </ul>
</x-guest-layout>