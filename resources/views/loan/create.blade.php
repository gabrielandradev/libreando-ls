<x-app-layout>
    <h1>Estas a punto de solicitar el préstamo de "{{$book->titulo}}"</h1>

    <p>Generaremos una solicitud de préstamo con la cual podrás presentarte en la biblioteca en cualquier turno para comenzar tu préstamo</p>

    <p>Esta solicitud estará vigente durante los próximos 5 días. Si no te presentás dentro de ese periodo de tiempo, eliminaremos tu solicitud automáticamente.</p>

    <form action="{{route('solicitar.prestamo.generar', $book->id)}}" method="post">
    @csrf
        <button>Solicitar préstamo</button>
    </form>
</x-app-layout>