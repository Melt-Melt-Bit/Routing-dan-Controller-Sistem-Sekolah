<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return "Menampilkan halaman daftar jurusan";
    }

    public function create()
    {
        return "Menampilkan halaman tambah jurusan";
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data jurusan";
    }

    public function show(string $major)
    {
        return "Menampilkan jurusan dengan ID: {$major}";
    }

    public function edit(string $major)
    {
        return "Menampilkan halaman edit jurusan dengan ID: {$major}";
    }

    public function update(Request $request, string $major)
    {
        return "Melakukan perubahan data jurusan dengan ID: {$major}";
    }

    public function destroy(string $major)
    {
        return "Menghapus data jurusan dengan ID: {$major}";
    }
}