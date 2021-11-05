<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Repositories\BookRepository;
use App\Services\BookService;

class BookController extends Controller
{
    private $bookRepository;
    private $bookService;

    public function __construct(
        BookRepository $bookRepository,
        BookService $bookService
    ) {
        $this->bookRepository = $bookRepository;
        $this->bookService = $bookService;

    }

    public function list() {
        $books = $this->bookRepository->paginate(15);
        return view('pages.books.list', [
            'books' => $books,
        ]);
    }

    public function checkOut(BookCheckOutRequest $request, Library $library) {
        $books = $this->bookRepository->getBookInLibrary($library, $request->input('bookIds'));
        return response()->json([
            'books' => $books,
        ]);

    }

    public function checkIn(Library $library) {

    }
}
