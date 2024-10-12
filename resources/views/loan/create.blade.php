<x-app-layout>
    <div class="loan-confirmation">
        <div class="loan-confirmation-content" id="loan-request-confirmation">
            <h1>Estas a punto de solicitar el préstamo de "{{$book->titulo}}"</h1>

            <div class="loan-separator"></div>

            <p>Generaremos una solicitud de préstamo con la cual <span>podrás presentarte en<br>
                la biblioteca en cualquier turno</span> para comenzar tu préstamo.<br>
                Esta solicitud estará <span>vigente durante los próximos 5 días.<span> Si <span>no te<br>
                presentás</span> dentro de ese periodo de tiempo, <span>eliminaremos tu solicitud<br>
                automáticamente.</span></p>

            <form action="{{route('solicitar.prestamo.generar', $book->id)}}" method="post">
            @csrf
                <button>Solicitar préstamo</button>
            </form>
        </div>
    </div>
    
</x-app-layout>