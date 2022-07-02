<?php

namespace App\Repositories\Impls;

use App\Repositories\UserBookRepository;
use App\Models\UserBook;

class UserBookRepositoryImpl extends GenericRepositoryImpl implements UserBookRepository {
    public function __construct(UserBook $model) {
        $this->model = $model;
    }

    public function findByUserIdAndBookIdInAndStatus($userId, array $bookIds, $status) {
        return $this->model
            ->where('user_id', $userId)
            ->whereIn('book_id', $bookIds)
            ->where('status', $status)
            ->get();
    }

    public function updateReturnBook($userId, array $bookIds) {
        return $this->model
            ->where('user_id', $userId)
            ->whereIn('book_id', $bookIds)
            ->where('status', 'IN_PROGRESS')
            ->update([
                'status' => 'DONE'
            ]);
    }
}
