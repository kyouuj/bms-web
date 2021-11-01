<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Library;

class LibraryController extends Controller
{
    public function list() {
        $libraries = Library::paginate(15);
        return view('pages.libraries.list', [
            'libraries' => $libraries
        ]);
    }
}
