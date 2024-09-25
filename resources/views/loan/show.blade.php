<x-app-layout>
    <h1>Solicitaste {{$loan->book->titulo}}</h1>
    <p>Fecha: {{$loan->fecha_solicitud}}</p>
    <x-download-loan-info loan_id="{{$loan->id}}" />
</x-app-layout>