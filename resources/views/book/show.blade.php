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
    @if (auth()->check())
        @if (auth()->user()->hasRole('administrador'))
            <a href="{{route('libro_editar', ['book' => $book])}}">Editar</a>
            <a href="{{route('libro_borrar', ['book' => $book])}}">Borrar</a>
        @endif
    @endif
</x-guest-layout>