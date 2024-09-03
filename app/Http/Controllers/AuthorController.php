<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function show(Author $author): View
    {
        return view("book.author.show", 
        [
            'author' => $author
        ]);
    }
}
