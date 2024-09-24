<x-app-layout>
    <h1>Mis préstamos</h1>
    @foreach ($loans as $loan)
    <div>
        <h2><a href="{{route('libro', $loan->book->id)}}">{{$loan->book->titulo}}</a></h2>
        <strong>Ubicación física: {{$loan->book->ubicacion_fisica}}</strong>
        <p>Solicitado el {{$loan->fecha_solicitud}}</p>
        <p>Estado de solicitud: {{$loan->loanStatus->estado}}</p>
    </div>
    @endforeach
</x-app-layout>