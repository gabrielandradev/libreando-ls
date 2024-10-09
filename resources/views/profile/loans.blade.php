<x-app-layout>
    <h1 class="loan-title">Mis préstamos</h1>
    <div class="loan-container">
        <div class="loan-section">
            @foreach ($loans as $loan)
            <div class="loan-item">
                <div class="loan-cover">
                    <img src="{{ asset('images/book/portada.png') }}" alt="Portada">
                </div>
                <div class="loan-info">
                    <div class="loan-info-title">
                        <a href="{{route('libro', $loan->book->id)}}">{{$loan->book->titulo}}</a>
                    </div>
                    <p>Solicitado el {{$loan->fecha_solicitud}}</p>
                    <p>Estado de solicitud: {{$loan->loanStatus->estado}}</p>
                    <p>Te quedan 2 días</p>
                    <x-download-loan-info loan_id="{{$loan->id}}" />
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>