<?php

namespace App\Services\Impls;

use App\Services\BookService;
use App\Models\Library;
use App\Models\Book;
use App\Models\User;
use App\Exceptions\BusinessException;

class BookServiceImpl extends GenericServiceImpl implements BookService {
    public function validateCheckOut(Library $library, User $user, array $books) {
        if (!$books || $books->count() == 0) {
            throw new BusinessException('book.not_found');
        }

        if ($books->count() != count($bookIds)) {
             throw new BusinessException('book.invalid');
        }
    }

    public function checkOut(Library $library, User $user, array $books) {
        
    }
}
