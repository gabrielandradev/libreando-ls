<x-app-layout>
    <strong>Solicitud de préstamo #{{$loan->id}}</strong>
    <h1>Prestar el artículo "{{$loan->book->titulo}}"</h1>
    <form action="#">
        @csrf
        <label for="fecha_prestamo">
            Fecha de préstamo: 
            <input type="date" readonly value="{{$date_now}}">
        </label>
        <br>
        <label for="fecha_devolucion">
            Fecha de devolución:
            <input type="date" name="fecha_devolucion" id="date" required value="{{$date_now}}" min="{{$date_now}}">
        </label>
        <br>
        <small>Al prestar, el artículo se marcará automáticamente como "prestado", y no estará disponible para nuevos préstamos</small>
        <br>
        <button>Prestar</button>
    </form>
</x-app-layout>