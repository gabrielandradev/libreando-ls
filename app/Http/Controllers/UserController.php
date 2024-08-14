<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function create(): View
    {
        return view("user.create");
    }

    public function store(Request $request, string $role): RedirectResponse
    {
        return redirect();
    }
}
