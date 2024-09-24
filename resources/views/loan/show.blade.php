<x-app-layout>
    <h1>Solicitaste {{$loan->book->titulo}}</h1>
    <p>Fecha: {{$loan->fecha_solicitud}}</p>
    <form action="{{route('prestamo.generado.pdf', $loan->id)}}" method="post">
        @csrf
        <button>Descargar comprobante</button>
    </form>
</x-app-layout>