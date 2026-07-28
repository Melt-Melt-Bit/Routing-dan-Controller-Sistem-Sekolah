<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return "Menampilkan halaman daftar siswa";
    }

    public function create()
    {
        return "Menampilkan halaman tambah siswa";
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data siswa";
    }

    public function show(string $student)
    {
        return "Menampilkan siswa dengan ID: {$student}";
    }

    public function edit(string $student)
    {
        return "Menampilkan halaman edit siswa dengan ID: {$student}";
    }

    public function update(Request $request, string $student)
    {
        return "Melakukan perubahan data siswa dengan ID: {$student}";
    }

    public function destroy(string $student)
    {
        return "Menghapus data siswa dengan ID: {$student}";
    }
}