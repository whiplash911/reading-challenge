<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function complete(Book $book)
    {
        $book->complete();

        return redirect('/challenges/'.$book->challenge->id);
    }
}
