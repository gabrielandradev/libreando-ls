<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Book;
use App\Models\Author;
use Illuminate\View\View;
use App\Constants\DisponibilidadLibro;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function show(Book $book): View
    {
        return view('book.show', ['book' => $book]);
    }

    public function create(): View
    {
        return view('book.create', ['disponibilidad' => DisponibilidadLibro::getAll()]);
    }

    public function store(BookUpdateRequest $request): RedirectResponse
    {
        $book = Book::create([
            'num_inventario' => $request->num_inventario,
            'ubicacion_fisica' => $request->ubicacion_fisica,
            'titulo' => $request->titulo,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial,
            'año_edicion' => $request->año_edicion,
            'num_edicion' => $request->num_edicion,
            'lugar_edicion' => $request->lugar_edicion,
            'desc_primario' => $request->desc_primario,
            'desc_secundario' => $request->desc_secundario,
            'idioma' => $request->idioma,
            'notas' => $request->notas,
            'num_paginas' => $request->num_paginas,
            'id_disponibilidad' => $request->disponibilidad,
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'fecha_edicion' => date('Y-m-d H:i:s')
        ]);

        $authors = array_filter(explode("\n", str_replace("\r", "", $request->autores)));

        foreach ($authors as $author) {
            $created_author = Author::create([
                'nombre' => $author
            ]);

            DB::table('Libro_Autor')->insert(
                ['id_libro' => $book->id, 'id_autor' => $created_author->id]
            );
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function edit(Book $book): View
    {
        return view('book.edit', ['book' => $book]);
    }

    public function update(BookUpdateRequest $request, Book $book): RedirectResponse
    {
        $book::update([
            'num_inventario' => $request->num_inventario,
            'ubicacion_fisica' => $request->ubicacion_fisica,
            'titulo' => $request->titulo,
            'isbn_10' => $request->isbn_10,
            'isbn_13' => $request->isbn_13,
            'año_edicion' => $request->año_edicion,
            'num_edicion' => $request->num_edicion,
            'lugar_edicion' => $request->lugar_edicion,
            'desc_primario' => $request->desc_primario,
            'desc_secundario' => $request->desc_secundario,
            'idioma' => $request->idioma,
            'notas' => $request->notas,
            'num_paginas' => $request->num_paginas,
            'id_disponibilidad' => $request->disponibilidad,
            'fecha_edicion' => date('Y-m-d H:i:s')
        ]);

        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('dashboard');
    }
}
