<x-app-layout>
    <h1>Activar cuentas pendientes</h1>
    <ul>
        @foreach ($accounts_pending as $account)
            <li>{{$account->email}}</li>
            <a href="#">Activar</a>
        @endforeach
    </ul>

    {{$accounts_pending->links('vendor.pagination.default')}}
</x-app-layout>