<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    @endpush
    <div class="table-container">
        <h1>Cuentas de estudiantes pendientes de aprobación</h1>
        <table class="table">
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

            @foreach ($accounts_pending as $student)
            <tr>
                <td>{{$student->apellido}}, {{$student->nombre}}</td>
                <td>{{$student->dni}}</td>
                <td>{{$student->major->nombre}}</td>
                <td class="centred-td">{{$student->año}}</td>
                <td class="centred-td">{{$student->division}}</td>
                <td>{{$student->shift->nombre}}</td>
                <td>{{$student->telefono}}</td>
                <td>{{$student->domicilio}}</td>
                <td>{{$student->user->email}}</td>
                <td class="table-btn">
                    <form action="{{route('activar-usuario', $student->user->id)}}" method="post">
                        @csrf
                        <button class="accept-btn">
                            Activar
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" >
                                <path class="accept-normal" d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path>
                                <path class="accept-hover" d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path>    
                            </svg>
                        </button>
                    </form>
                    <form action="{{route('eliminar-usuario', $student->user->id)}}" method="post">
                        @csrf
                        <button class="reject-btn">
                            Rechazar
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#181143">
                                <path class="reject-normal" d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                <path class="reject-hover" d="m 127.56497,-721.21958 -11.68541,-79.14197 197.85491,-29.21353 -5.84271,-39.57099 237.4259,-35.05619 5.84272,39.57093 197.85491,-29.2135 11.68542,79.14194 z m 148.92711,614.08194 c -22,0 -40.83333,-7.83333 -56.5,-23.5 -15.66667,-15.66666 -23.5,-34.49999 -23.5,-56.49999 v -520 h 600 -40 v 520 c 0,22 -7.83333,40.83333 -23.5,56.49999 -15.66667,15.66667 -34.5,23.5 -56.5,23.5 z m 400,-599.99999 h -400 v 520 h 400 z m -320,440 h 80 v -360 h -80 z m 160,0 h 80 v -360 h -80 z m -240,-440 v 520 z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    {{$accounts_pending->links('vendor.pagination.default')}}
</x-app-layout>