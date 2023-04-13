<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BooksController extends Controller
{
    public function index()
    {
        $books = json_decode(Http::get('http://127.0.0.1:8000/api/v1/frontend-books')->body());
        return view('books-index', compact('books'));
    }

    public function edit($id)
    {
        $book = Http::get("http://127.0.0.1:8000/api/v1/frontend-books/show/{$id}")->body();
        dd($book);
    }

    public function destroy($id)
    {
        dd($id);
    }
}
