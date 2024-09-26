<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Book;
use Illuminate\View\View;
use Redirect;

class WishlistController extends Controller
{
    public function store(Book $book): RedirectResponse
    {
        $wishlist = Wishlist::create([
            'id_usuario' => Auth::user()->id,
            'id_libro' => $book->id
        ]);

        // return redirect()->intended(route('dashboard', absolute: false));
        // return view('wishlist.agregar', ['wishlist' => $wishlist]);
        return redirect()->route('dashboard');
    }

    public function show(): View
    {
        // $wishlist = Wishlist::where('id_usuario', Auth::user()->id)
        // ->simplePaginate(10);

        return view('wishlist.ver', ['book_list' => Auth::user()->wishlist]);
    }
}
