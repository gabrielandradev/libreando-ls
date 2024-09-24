<x-app-layout>
    <h1>Mis préstamos</h1>
    @foreach ($loans as $loan)
        <ul>
            <li><a href="{{route('libro', $loan->book->id)}}">{{$loan->book->titulo}}</a></li>
        </ul>
    @endforeach
</x-app-layout>