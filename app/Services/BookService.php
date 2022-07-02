<?php

namespace App\Services;

interface BookService extends GenericService {
    public function validateCheckOut($library, $user, array $books);
    public function checkOut($library, $user, array $books, array $input);
}
