<?php

namespace App\Services\Impls;

use App\Services\BookService;
use App\Exceptions\BusinessException;
use Carbon\Carbon;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserBookRepository;
use App\Repositories\LibraryBookRepository;

class BookServiceImpl extends GenericServiceImpl implements BookService {
    private $bookRepository;
    private $userRepository;
    private $userBookRepository;
    private $libraryBookRepository;

    public function __construct(
        BookRepository $bookRepository,
        UserRepository $userRepository,
        UserBookRepository $userBookRepository,
        LibraryBookRepository $libraryBookRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->userRepository = $userRepository;
        $this->userBookRepository = $userBookRepository;
        $this->libraryBookRepository = $libraryBookRepository;

    }

    public function validateCheckOut($library, $user, array $books) {
        if (!$books || $books->count() == 0) {
            throw new BusinessException('book.not_found');
        }
        $userBooks = $this->userBookRepository->findByUserIdAndBookIdInAndStatus($user->id, $books->pluck('id'), 'IN_PROGRESS');
        if ($userBooks->count()) {
            throw new BusinessException('book.in_progress');
        }
    }

    public function checkOut($library, $user, array $books, array $input) {
        $userBooks = [];
        foreach ($books as $book) {
            $userBooks[$book->id] = [
                'borrow_date' => Carbon::now(),
                'return_date' => $input['return_date'],
                'status' => 'IN_PROGRESS'
            ];
        }
        $user->books()->attach($userBooks);
    }

    public function checkIn($library, $user, array $books) {
        $bookIds = $books->pluck('id');
        $userBookRepository->updateReturnBook($user->id, $bookIds);
        $libraryBookRepository->updateReturnBook($library->id, $bookIds);
    }
}
