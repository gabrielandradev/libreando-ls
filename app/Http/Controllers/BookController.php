<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function show(Book $book): View
    {
        return view('book', compact('book'));
    }

    public function create(): View
    {
        return view("book.create");
    }

    public function store(BookUpdateRequest $request): RedirectResponse
    {
        $book = Book::create([
            'num_inventario' => $request->num_inventario,
            'ubicacion_fisica' => $request->ubicacion_fisica,
            'titulo' => $request->titulo,
            'año_edicion' => $request->año_edicion,
            'num_edicion' => $request->num_edicion,
            'lugar_edicion' => $request->lugar_edicion,
            'isbn' => $request->isbn,
            'desc_primario' => $request->desc_primario,
            'desc_secundario' => $request->desc_secundario,
            'idioma' => $request->idioma,
            'notas' => $request->notas,
            'num_paginas' => $request->num_paginas
        ]);

        return redirect("/");
    }

    public function edit(Request $request): View
    {
        $book = Book::findOrFail($request->id);
        return view('book.edit', compact('post'));
    }

    public function update(BookUpdateRequest $request): RedirectResponse
    {
        $book = Book::find($request->id);
        $book->update($request->all());
        return redirect("")->route('book.index')
            ->with('Success', 'Updated book sucesfully.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $book = Book::findOrFail($request->id);
        $book->delete();
        return redirect()->route('index')
            ->with('Success', 'Deleted book sucesfully.');
    }
}
