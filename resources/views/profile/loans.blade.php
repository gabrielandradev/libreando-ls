<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/loan_view.css') }}">
    @endpush

    <h1 class="loan-title">Mis préstamos</h1>
    <div class="loan-section">
        @foreach ($loans as $loan)
        <div class="loan-item">
            <a href="{{route('libro', $loan->book->id)}}">
                <h2>{{$loan->book->titulo}}</h2>
                </a>
                <p>Solicitado el {{$loan->fecha_solicitud}}</p>
                <p>Estado de solicitud: {{$loan->loanStatus->estado}}</p>
                <form action="{{route('prestamo.generado.pdf', $loan->id)}}" method="post">
                    @csrf
                    <button>Descargar comprobante</button>
                </form>
        </div>
        @endforeach

    </div>
</x-app-layout>