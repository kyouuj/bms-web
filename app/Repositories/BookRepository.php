<?php

namespace App\Repositories;

interface BookRepository extends GenericRepository {
    public function getBookInLibrary($library, array $bookIds);
}
