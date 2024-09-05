<x-app-layout>
    <x-auth-session-status :status="session('status')" />

    <h1>Crear nuevo libro</h1>
    <hr>

    @include('book.partials.details-form', ['book' => null])

    <style>
        body {
            text-align: center;
        }
    </style>
</x-app-layout>