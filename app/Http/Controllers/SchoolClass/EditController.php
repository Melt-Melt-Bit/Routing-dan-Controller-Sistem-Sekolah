<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(string $class)
    {
        return "Menampilkan halaman edit kelas dengan ID: {$class}";
    }
}