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
        Wishlist::firstOrCreate([
            'id_usuario' => Auth::user()->id,
            'id_libro' => $book->id
        ]);
        return redirect()->back();
    }

    public function show(): View
    {
        return view('wishlist.ver', ['book_list' => Auth::user()->wishlist]);
    }

    public function destroy($id): RedirectResponse
    {
        Wishlist::where('id', $id)->firstorfail()->delete();
        return redirect()->back();
    }
}
