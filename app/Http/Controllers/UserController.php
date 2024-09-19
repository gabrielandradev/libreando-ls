<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use App\Models\AccountStatus;
use App\Models\Role;

class UserController extends Controller
{
    public function studentPendingAccounts(): View
    {

        return view('admin.account_management.student_pending', [
            'accounts_pending' => User::pendingAccounts(10)
        ]);
    }

    public function teacherPendingAccounts(): View
    {

        return view('admin.account_management.teacher_pending', [
            'accounts_pending' => User::pendingAccounts(10)
        ]);
    }

    public function store(Request $request): User
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:Usuario'],
            'contraseña' => ['required', 'string', Password::defaults()],
            'rol' => ['not_in:' . Role::ROLE_ADMIN]
        ]);

        $pending_status_id = AccountStatus::where(
            'estado',
            AccountStatus::STATUS_PENDING
        )->first()->id;

        $role_id = Role::where('nombre', $request->rol)
            ->first()->id;

        $user = User::create([
            'email' => $request->email,
            'contraseña' => $request->contraseña,
            'id_rol' => $role_id,
            'id_estado_cuenta' => $pending_status_id
        ]);

        return $user;
    }
}
