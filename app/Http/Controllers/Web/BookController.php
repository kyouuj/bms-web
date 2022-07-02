<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Repositories\BookRepository;
use App\Services\BookService;
use App\Requests\BookCheckOutRequest;
use App\Requests\BookCheckInRequest;
use App\Repositories\UserRepository;

class BookController extends Controller
{
    private $bookRepository;
    private $bookService;
    private $userRepository;

    public function __construct(
        BookRepository $bookRepository,
        BookService $bookService,
        UserRepository $userRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->bookService = $bookService;
        $this->userRepository = $userRepository;

    }

    public function list() {
        $books = $this->bookRepository->paginate(15);
        return view('pages.books.list', compact('books'));
    }

    public function checkOut(BookCheckOutRequest $request, Library $library) {
        $books = $this->bookRepository->getBookInLibrary($library, $request->input('bookIds'));
        $user = $this->userRepository->findById($request->input('userId'));
        try {
            $this->bookRepository->validateCheckOut($library, $user, $books);
            $this->bookRepository->checkOut($library, $user, $books, $request->only(['borrow_date']));
        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'books' => $books,
        ]);

    }

    public function checkIn(BookCheckInRequest $request, Library $library) {
        $books = $this->bookRepository->getBookInLibrary($library, $request->input('bookIds'));
        $user = $this->userRepository->findById($request->input('userId'));

        try {
            $this->bookService->checkIn($library, $user, $books);
        } catch(Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
        return response()->json([
            'books' => $books,
        ]);
    }
}
