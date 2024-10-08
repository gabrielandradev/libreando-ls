<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/loan_view.css') }}">
    @endpush

    <h1 class="loan-title">Mis préstamos</h1>
    <div class="loan-section">
        @foreach ($loans as $loan)
        <div class="loan-item">
            <div class="loan-cover">
                <img src="{{ asset('images/book/portada.png') }}" alt="Portada">
            </div>
            <div class="loan-info">
                <a href="{{route('libro', $loan->book->id)}}">
                    <h2>{{$loan->book->titulo}}</h2>
                </a>
                <p>Solicitado el {{$loan->fecha_solicitud}}</p>
                <p>Estado de solicitud: {{$loan->loanStatus->estado}}</p>
                <p>Te quedan 2 días</p>
                <x-download-loan-info loan_id="{{$loan->id}}" />
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>