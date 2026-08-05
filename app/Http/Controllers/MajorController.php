<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Jurusan";
        $majors = [

        [

        'id' => 1,

        'code' => 'AKL',

        'name' => 'Akuntansi dan Keuangan Lembaga',

        'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',

        ],

        [

        'id' => 2,

        'code' => 'TKJ',

        'name' => 'Teknik Komputer dan Jaringan',

        'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',

        ],

        [

        'id' => 3,

        'code' => 'BD',

        'name' => 'Bisnis Digital',

        'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',

        ],

        ];
        return view('majors.index', [
            'title' => $title,
            'majors' => $majors
        ]);
    }

    public function create()
    {
        return view('majors.create', [
            'title' => 'Sistem Sekolah - Tambah Jurusan'
        ]);
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data jurusan";
    }

    public function show(string $major)
    {
        return view('majors.show', [
            'title' => 'Sistem Sekolah - Detail Jurusan'
        ]);
    }

    public function edit(string $major)
    {
        return view('majors.edit', [
            'title' => 'Sistem Sekolah - Edit Jurusan'
        ]);
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