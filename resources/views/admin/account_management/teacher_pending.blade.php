<x-app-layout>
    <h1>Cuentas de profesores pendientes de aprobacion</h1>
    <ul>
        @foreach ($accounts_pending as $teacher)
        <div>
            <h2>{{$teacher->apellido}}, {{$teacher->nombre}}</h2>
            <p>DNI: {{$teacher->dni}}</p>
            <p>Especialidad: {{$teacher->especialidad}}</p>
            <p>Telefono: {{$teacher->telefono}}</p>
            <p>Domicilio: {{$teacher->domicilio}}</p>
            <p>Email: {{$teacher->user->email}}</p>
            <form action="{{route('activar-usuario', $teacher->user->id)}}" method="post">
                @csrf
                <button>Activar</button>
            </form>
            <form action="{{route('eliminar-usuario', $teacher->user->id)}}" method="post">
                @csrf
                <button>Eliminar</button>
            </form>
        </div>
        @endforeach
    </ul>

    {{$accounts_pending->links('vendor.pagination.default')}}
</x-app-layout>