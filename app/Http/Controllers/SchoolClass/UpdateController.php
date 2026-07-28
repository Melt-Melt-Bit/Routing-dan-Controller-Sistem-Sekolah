<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, string $class)
    {
        return "Melakukan perubahan data kelas dengan ID: {$class}";
    }
}