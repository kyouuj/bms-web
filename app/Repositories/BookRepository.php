<?php

namespace App\Repositories;

use App\Models\Library;

interface BookRepository extends GenericRepository {
    public function getBookInLibrary(Library $library, $bookIds = []);
}
