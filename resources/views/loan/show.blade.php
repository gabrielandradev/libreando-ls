<x-app-layout>
    <div class="loan-confirmation">
        <div class="loan-confirmation-content" id="loan-request-sended">
            <h1>Solicitaste {{$loan->book->titulo}}</h1>
            <div class="loan-separator"></div>
            <p><span>Fecha:</span> {{$loan->fecha_solicitud}}</p>
            <x-download-loan-info loan_id="{{$loan->id}}" />
        </div>
    </div>
</x-app-layout>