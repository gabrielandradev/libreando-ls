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
        $validate = $request->validate([BookUpdateRequest::rules()]);

        $book = Book::create([
            'num_inventario' => $request->input('num_inventario'),
            'ubicacion_fisica' => $request->input('ubicacion_fisica'),
            'titulo' => $request->input('titulo'),
            'año_edicion' => $request->input('año_edicion'),
            'num_edicion' => $request->input('num_edicion'),
            'lugar_edicion' => $request->input('lugar_edicion'),
            'isbn' => $request->input('isbn'),
            'desc_primario' => $request->input('desc_primario'),
            'desc_secundario' => $request->input('desc_secundario'),
            'idioma' => $request->input('idioma'),
            'notas' => $request->input('notas'),
            'num_paginas' => $request->input('num_paginas')
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
        $validate = $request->validate([BookUpdateRequest::rules()]);

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