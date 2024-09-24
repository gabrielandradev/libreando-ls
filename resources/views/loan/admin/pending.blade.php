<x-app-layout>
    <h1>Solicitudes de prestamo recientes</h1>
    @foreach ($loans as $loan)
        <h2>Prestamo #{{$loan->id}}</h2>
        <li>Artículo a prestar: {{$loan->book->titulo}}</li>
        <li>Prestatario: {{$loan->borrower->email}}</li>
        <li>Solicitud realizada el {{$loan->fecha_solicitud}}</li>
    @endforeach
</x-app-layout>