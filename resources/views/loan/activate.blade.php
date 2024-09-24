<x-app-layout>
    <strong>Solicitud de préstamo #{{$loan->id}}</strong>
    <h1>Prestar el artículo "{{$loan->book->titulo}}"</h1>
    <form action="{{route('prestar-libro', $loan)}}" method="put">
        @csrf
        <label for="fecha_prestamo">
            Fecha de préstamo: 
            <input type="date" name="fecha_prestamo" readonly value="{{$date_now}}">
        </label>
        <br>
        <label for="fecha_devolucion">
            Fecha de devolución:
            <input type="date" name="fecha_devolucion" id="date" required value="{{$date_now}}" min="{{$date_now}}">
        </label>
        <br>
        <small>Al prestar, el artículo se marcará automáticamente como "prestado", y no estará disponible para nuevos préstamos</small>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button>Prestar</button>
    </form>
</x-app-layout>