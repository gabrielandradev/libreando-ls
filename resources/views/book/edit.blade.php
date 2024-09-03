<x-app-layout>
    <x-auth-session-status :status="session('status')" />
    <h1>Editar "{{$book->titulo}}"</h1>

    @include('book.partials.details-form', ['book' => $book])

    <style>
        body {
            text-align: center;
        }
    </style>

</x-app-layout>