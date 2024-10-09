<x-app-layout>
    <div class="loan-confirmation">
        <div class="loan-confirmation-content">
            <h1>Solicitaste {{$loan->book->titulo}}</h1>
            <p>Fecha: {{$loan->fecha_solicitud}}</p>
            <x-download-loan-info loan_id="{{$loan->id}}" />
        </div>
    </div>
</x-app-layout>