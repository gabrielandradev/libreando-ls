<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Student;
use App\Models\Role;
use App\Models\AccountStatus;
use App\Models\Shift;
use App\Models\Major;

class StudentController extends Controller
{
    public function create(): View
    {
        return view("auth.student.create");
    }

    public function store(Request $request): RedirectResponse
    {
        $userRequestContent = new Request
        ([
                'email' => $request->email,
                'contraseña' => $request->contraseña,
                'rol' => Role::ROLE_STUDENT
            ]);

        $userController = new UserController();

        $request->validate([
            'nombre' => ['required', 'string', 'alpha:ascii'],
            'apellido' => ['required', 'string', 'alpha:ascii'],
            'dni' => ['required', 'integer', 'numeric', 'digits:8', 'unique:Estudiante'],
            'telefono' => ['required', 'integer', 'numeric', 'digits:10'],
            'año' => ['required', 'string'],
            'division' => ['required', 'string'],
            'especialidad' => ['required', 'string'],
            'turno' => ['required', 'string'],
            'domicilio' => ['required', 'string']
        ]);

        $user = $userController->store($userRequestContent);

        $id_turno = Shift::where('nombre', $request->turno)->first()->id;
        $id_especialidad = Major::where('nombre', $request->especialidad)->first()->id;

        Student::create([
            'dni' => $request->dni,
            'id_usuario' => $user->id,
            'apellido' => $request->apellido,
            'nombre' => $request->nombre,
            'año' => $request->año,
            'division' => $request->division,
            'id_turno' => $id_turno,
            'id_especialidad' => $id_especialidad,
            'domicilio' => $request->domicilio,
            'telefono' => $request->telefono,
        ]);

        event(new Registered($user));

        return redirect(route('dashboard', absolute: false));
    }

    public function studentPendingAccounts(): View
    {
        $pending = Student::select('nombre', 'apellido')
            ->has('user.pendingAccount')
            ->simplePaginate(10);

        return view('admin.account_management.student_pending', [
            'accounts_pending' => $pending
        ]);
    }
}
