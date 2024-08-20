<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BookController extends Controller
{
    public function create(): View {

    }

    public function store(Request $request): RedirectResponse {

    }

    public function edit(Request $request): View
    {

    }

    public function update(BookUpdateRequest $request): RedirectResponse
    {

    }

    public function destroy(Request $request): RedirectResponse
    {

    }
}
