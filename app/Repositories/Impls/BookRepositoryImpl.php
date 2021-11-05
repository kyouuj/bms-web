<?php

namespace App\Repositories\Impls;

use App\Repositories\BookRepository;
use App\Models\Book;
use App\Models\Library;

class BookRepositoryImpl extends GenericRepositoryImpl implements BookRepository {
    public function __construct(Book $model) {
        $this->model = $model;
    }

    public function getBookInLibrary(Library $library, $bookIds = []) {
        $books = Book::join('library_books', 'library_books.book_id', '=', 'books.id')
            ->whereIn('books.id', $bookIds)
            ->where('library_books.library_id', $library->id)
            ->where('library_books.quantity', '>', 0)
            ->get();

        return $books;
    }
}
