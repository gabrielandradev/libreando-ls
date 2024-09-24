<x-app-layout>
    <h1>Préstamos activos</h1>
    
    @foreach ($loans as $loan)
        <h2>{{$loan->book->titulo}}</h2>
    @endforeach
</x-app-layout>