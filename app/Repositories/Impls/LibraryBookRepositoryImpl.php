<?php

namespace App\Repositories\Impls;

use App\Repositories\LibraryBookRepository;
use App\Models\LibraryBook;

class LibraryBookRepositoryImpl extends GenericRepositoryImpl implements LibraryBookRepository {
    public function __construct(LibraryBook $model) {
        $this->model = $model;
    }

    public function updateReturnBook($libraryId, array $bookIds) {
        return $this->model
            ->where('library', $libraryId)
            ->whereIn('book_id', $bookIds)
            ->update([
                'quantity' => 'quantity + 1'
            ]);
    }
}
