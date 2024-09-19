<x-app-layout>
    <h1>Cuentas de profesores pendientes de aprobacion</h1>
    <ul>
        @foreach ($accounts_pending as $account)
            <li>{{$account->apellido}}, {{$account->nombre}}</li>
            <a href="#">Activar</a>
        @endforeach
    </ul>

    {{$accounts_pending->links('vendor.pagination.default')}}
</x-app-layout>