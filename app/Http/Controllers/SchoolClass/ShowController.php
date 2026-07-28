<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(string $class)
    {
        return "Menampilkan kelas dengan ID: {$class}";
    }
}