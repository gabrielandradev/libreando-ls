<x-app-layout>
    <h1>Solicitudes de préstamo pendientes</h1>
    @foreach ($loans as $loan)
        <h2>Solicitud de préstamo #{{$loan->id}}</h2>
        <li>Artículo a prestar: <a href="{{route('libro', $loan->book->id)}}">{{$loan->book->titulo}}</a></li>
        <li>Prestatario: {{$loan->borrower->email}}</li>
        <li>Solicitud realizada el {{$loan->fecha_solicitud}}</li>
    @endforeach

    {{$loans->links('vendor.pagination.default')}}
</x-app-layout>