<x-guest-layout>
    <h1>{{$book->titulo}}</h1>
    <table>
        <tr>
            @foreach ($book->getHidden() as $value)
                <th>{{$value}}</th>
            @endforeach
            @foreach ($book->getFillable() as $value)
                <th>{{$value}}</th>
            @endforeach
        </tr>
        <tr>
            @foreach ($book->getAttributes() as $value)
                <td>{{$value}}</td>
            @endforeach
        </tr>
    </table>

    <h2>Autores</h2>
    <ul>
        @foreach ($book->authors as $author)
            <li><a href="{{route('autor', [$author->id])}}">{{$author->nombre}}</a></li>
        @endforeach
    </ul>

    <h2>Descriptores Secundarios</h2>
    <ul>
        @foreach ($book->secondaryDescs as $secondary_desc)
            <li>{{$secondary_desc->descriptor}}</li>
        @endforeach
    </ul>

    @if (auth()->check())
        @if (auth()->user()->role->nombre == 'administrador')
            <a href="{{route('libro_editar', ['book' => $book])}}">Editar</a>
            <a href="{{route('libro_borrar', ['book' => $book])}}">Borrar</a>
        @endif
    @endif
</x-guest-layout>