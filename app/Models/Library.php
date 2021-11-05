<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Library extends Model
{
    use HasFactory;

    public function books() {
        return $this->belongsToMany(Book::class, 'library_books', 'library_id', 'book_id')->withPivot('quantity');
    }
}
