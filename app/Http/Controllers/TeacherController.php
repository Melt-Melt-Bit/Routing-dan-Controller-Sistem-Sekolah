<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return "Menampilkan halaman daftar guru";
    }

    public function create()
    {
        return "Menampilkan halaman tambah guru";
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data guru";
    }

    public function show(string $teacher)
    {
        return "Menampilkan guru dengan ID: {$teacher}";
    }

    public function edit(string $teacher)
    {
        return "Menampilkan halaman edit guru dengan ID: {$teacher}";
    }

    public function update(Request $request, string $teacher)
    {
        return "Melakukan perubahan data guru dengan ID: {$teacher}";
    }

    public function destroy(string $teacher)
    {
        return "Menghapus data guru dengan ID: {$teacher}";
    }
}