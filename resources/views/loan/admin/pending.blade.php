<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    @endpush
    <div class="table-container">
        <h1>Solicitudes de préstamo pendientes</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Solicitud de préstamo</th>
                    <th>Articulo a prestar</th>
                    <th>Prestatario</th>
                    <th>Fecha de solicitud</th>
                    <th>Aceptar préstamo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                <tr>
                    <td data-label="N° préstamo">#{{$loan->id}}</td>
                    <td data-label="Articulo a prestar"><a href="{{route('libro', $loan->book->id)}}">{{$loan->book->titulo}}</td>
                    <td data-label="Prestatario">{{$loan->borrower->email}}</td>
                    <td data-label="Fecha de solicitud">{{$loan->fecha_solicitud}}</td>
                    <td data-label="Aceptar préstamo" class="process-btn">
                        <form action="{{route('prestamo.procesar', $loan->id)}}" method="get">
                            @csrf
                            <button>
                                Aceptar
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m508-398 226-226-56-58-170 170-86-84-56 56 142 142ZM320-240q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/></svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            
        </table>  
    </div>

    {{$loans->links('vendor.pagination.default')}}
</x-app-layout>