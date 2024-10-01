<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Book;
use App\Models\Author;
use App\Models\BookAuthor;
use App\Models\SecondaryDesc;
use App\Models\BookSecondaryDesc;
use Illuminate\View\View;
use App\Models\BookAvailability;

class BookController extends Controller
{
    public function show(Book $book): View
    {
        return view('book.show', compact('book'));
    }

    public function create(): View
    {
        return view(
            'book.create',
            ['bookAvailabilityStatuses' => BookAvailability::all()]
        );
    }

    public function store(BookUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'ubicacion_fisica' => ['required', 'string'],
            'titulo' => ['required'],
            'isbn' => ['required', 'unique:Libro'],
            'editorial' => ['required'],
            'año_edicion' => ['date_format:Y'],
            'num_edicion' => ['string'],
            'lugar_edicion' => ['string'],
            'desc_primario' => ['required', 'string'],
            'idioma' => ['string'],
            'notas' => ['string'],
            'num_paginas' => ['numeric'],
            'id_disponibilidad' => ['numeric']
        ]);

        $book = Book::create([
            'ubicacion_fisica' => $request->ubicacion_fisica,
            'titulo' => $request->titulo,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial,
            'año_edicion' => $request->año_edicion,
            'num_edicion' => $request->num_edicion,
            'lugar_edicion' => $request->lugar_edicion,
            'desc_primario' => $request->desc_primario,
            'idioma' => $request->idioma,
            'notas' => $request->notas,
            'num_paginas' => $request->num_paginas,
            'id_disponibilidad' => $request->disponibilidad,
            'fecha_creacion' => date('Y-m-d'),
            'fecha_edicion' => date('Y-m-d')
        ]);

        foreach ($request->autores as $autor) {
            $created_author = Author::create(['nombre' => $autor]);

            BookAuthor::create([
                'id_libro' => $book->id,
                'id_autor' => $created_author->id
            ]);
        }

        foreach ($request->desc_secundario as $desc_secundario) {
            $created_desc = SecondaryDesc::firstOrCreate([
                'descriptor' => $desc_secundario
            ]);

            BookSecondaryDesc::create([
                'id_libro' => $book->id,
                'id_descriptor_sec' => $created_desc->id
            ]);
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function edit(Book $book): View
    {
        return view(
            'book.edit',
            [
                'book' => $book,
                'bookAvailabilityStatuses' => BookAvailability::all()
            ]
        );
    }

    public function update(BookUpdateRequest $request, Book $book): RedirectResponse
    {
        $book->update([
            'ubicacion_fisica' => $request->ubicacion_fisica,
            'titulo' => $request->titulo,
            'isbn' => $request->isbn,
            'editorial' => $request->editorial,
            'año_edicion' => $request->año_edicion,
            'num_edicion' => $request->num_edicion,
            'lugar_edicion' => $request->lugar_edicion,
            'desc_primario' => $request->desc_primario,
            'idioma' => $request->idioma,
            'notas' => $request->notas,
            'num_paginas' => $request->num_paginas,
            'id_disponibilidad' => $request->disponibilidad,
            'fecha_edicion' => date('Y-m-d H:i:s')
        ]);

        foreach ($request->autores as $autor) {
            $created_author = Author::create(['nombre' => $autor]);

            BookAuthor::create([
                'id_libro' => $book->id,
                'id_autor' => $created_author->id
            ]);
        }

        foreach ($request->desc_secundario as $desc_secundario) {
            $created_desc = SecondaryDesc::create([
                'descriptor' => $desc_secundario
            ]);

            BookSecondaryDesc::create([
                'id_libro' => $book->id,
                'id_descriptor_secundario' => $created_desc->id
            ]);
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('dashboard');
    }
}
