<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Book;

class DashboardController extends Controller
{
    public static function index(): View {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return view('admin.dashboard');
        }

        $books = Book::select(['id', 'titulo'])->paginate(10);

        return view('index', ['books' => $books]);
    }
}
