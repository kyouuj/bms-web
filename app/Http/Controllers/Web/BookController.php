<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function list() {
        $books = Book::paginate(15);
        return view('pages.books.list', [
            'books' => $books,
        ]);
    }
}
