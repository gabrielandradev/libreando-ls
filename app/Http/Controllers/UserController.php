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
    public function showPendingAccounts(): View {

        return view('admin.account_management.activate_pending', [
            'accounts_pending' => User::pendingAccounts(10)
        ]);
    }

    public function store(Request $request): User
    {
        $request->validate([
            'email' => ['required', 'string', 'email:rfc,dns', 'unique:Usuario'],
            'contraseña' => ['required', 'string', Password::defaults()],
        ]);

        $pending_status = AccountStatus::where('estado', AccountStatus::STATUS_PENDING)
        ->first()->id;

        $user = User::create([
            'email' => $request->email,
            'contraseña' => $request->contraseña,
            'id_rol' => Role::where('nombre', $request->rol)->first()->id,
            'id_estado_cuenta' => $pending_status
        ]);

        return $user;
    }
}
