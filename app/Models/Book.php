<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $casts = [
        'borrow_date' => 'date',
        'return_date' => 'date',
    ];
}
