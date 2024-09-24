<x-app-layout>
    <h1>Solicitar préstamo de "{{$book->titulo}}"</h1>

    <form action="{{route('generar-prestamo', $book->id)}}" method="post">
    @csrf
        
    </form>
</x-app-layout>