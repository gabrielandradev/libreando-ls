<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function create(): View
    {
        return view("teacher.create");
    }

    public function store(Request $request): RedirectResponse
    {
        
    }
}
