<?php

namespace App\Repositories;

interface UserBookRepository extends GenericRepository {
    public function findByUserIdAndBookIdInAndStatus($userId, array $bookIds, $status);
    public function updateReturnBook($userId, array $bookIds);
}
