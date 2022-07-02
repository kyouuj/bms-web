<?php

namespace App\Repositories;

interface LibraryBookRepository extends GenericRepository {
    public function updateReturnBook($libraryId, array $bookIds);
}
