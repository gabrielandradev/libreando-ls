<x-app-layout>
    <h1>Cuentas de estudiantes pendientes de aprobacion</h1>
    <div>
        @foreach ($accounts_pending as $student)
        <div>
            <h2>{{$student->apellido}}, {{$student->nombre}}</h2>
            <p>DNI: {{$student->dni}}</p>
            <p>Especialidad: {{$student->major->nombre}}</p>
            <p>Año: {{$student->año}}</p>
            <p>División: {{$student->division}}</p>
            <p>Turno: {{$student->shift->nombre}}</p>
            <p>Telefono: {{$student->telefono}}</p>
            <p>Domicilio: {{$student->domicilio}}</p>
            <p>Email: {{$student->user->email}}</p>
            <form action="{{route('activar-usuario', $student->user->id)}}" method="post">
                @csrf
                <button>Activar</button>
            </form>
            <form action="{{route('eliminar-usuario', $student->user->id)}}" method="post">
                @csrf
                <button>Eliminar</button>
            </form>
        </div>
        @endforeach
    </div>

    {{$accounts_pending->links('vendor.pagination.default')}}
</x-app-layout>