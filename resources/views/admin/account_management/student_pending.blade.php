<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    @endpush
    <div class="table-container">
        <h1>Cuentas de estudiantes pendientes de aprobación</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre y apellido</th>
                    <th>DNI</th>
                    <th>Especialidad</th>
                    <th>Año</th>
                    <th>División</th>
                    <th>Turno</th>
                    <th>Telefono</th>
                    <th>Domicilio</th>
                    <th>Email</th>
                    <th>Activar/Rechazar</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($accounts_pending as $student)
                <tr>
                    <td data-label="Nombre y Apellido">{{$student->apellido}}, {{$student->nombre}}</td>
                    <td data-label="DNI">{{$student->dni}}</td>
                    <td data-label="Especialidad">{{$student->major->nombre}}</td>
                    <td data-label="Año" class="centred-td">{{$student->año}}</td>
                    <td data-label="División" class="centred-td">{{$student->division}}</td>
                    <td data-label="Turno">{{$student->shift->nombre}}</td>
                    <td data-label="Telefono">{{$student->telefono}}</td>
                    <td data-label="Domicilio">{{$student->domicilio}}</td>
                    <td data-label="Email">{{$student->user->email}}</td>
                    <td class="table-btn">
                        <form action="{{route('activar-usuario', $student->user->id)}}" method="post">
                            @csrf
                            <button class="accept-btn">
                                Activar
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" >
                                    <path class="accept-normal" d="M20.29 8.29 16 12.58l-1.3-1.29-1.41 1.42 2.7 2.7 5.72-5.7zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path>
                                    <path class="accept-hover" d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.294-4.708-4.3 4.292-1.292-1.292-1.414 1.414 2.706 2.704 5.712-5.702z"></path>  
                                </svg>
                            </button>
                        </form>
                        <form action="{{route('eliminar-usuario', $student->user->id)}}" method="post">
                            @csrf
                            <button class="reject-btn">
                                Rechazar
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path class="reject-normal" d="m15.71 15.71 2.29-2.3 2.29 2.3 1.42-1.42-2.3-2.29 2.3-2.29-1.42-1.42-2.29 2.3-2.29-2.3-1.42 1.42L16.58 12l-2.29 2.29zM12 8a3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4 3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4zM6 8a1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2 1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path>
                                    <path class="reject-hover" d="M8 12.052c1.995 0 3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5 1.505 3.5 3.5 3.5zM9 13H7c-2.757 0-5 2.243-5 5v1h12v-1c0-2.757-2.243-5-5-5zm11.293-4.707L18 10.586l-2.293-2.293-1.414 1.414 2.292 2.292-2.293 2.293 1.414 1.414 2.293-2.293 2.294 2.294 1.414-1.414L19.414 12l2.293-2.293z"></path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            
        </table>
    </div>

    {{$accounts_pending->links('vendor.pagination.default')}}
</x-app-layout>