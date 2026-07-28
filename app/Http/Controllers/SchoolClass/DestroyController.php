<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke(string $class)
    {
        return "Menghapus data kelas dengan ID: {$class}";
    }
}