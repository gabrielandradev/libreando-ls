@props([
    'loan_id',
])

<form action="{{route('prestamo.generado.pdf', $loan_id)}}" method="post">
    @csrf
    <button>Descargar comprobante</button>
</form>