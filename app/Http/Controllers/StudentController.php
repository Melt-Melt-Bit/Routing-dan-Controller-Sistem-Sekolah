<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = [
            [
                'id' => 1,
                'nis' => '1234567890',
                'name' => 'John Doe',
                'class' => '12 TKJ 3',
                'major' => 'TKJ'
            ],
            [
                'id' => 2,
                'nis' => '0987654321',
                'name' => 'Jane Smith',
                'class' => '11 AKL 2',
                'major' => 'AKL'
            ],
            [
                'id' => 3,
                'nis' => '5678901234',
                'name' => 'Michael Johnson',
                'class' => '10 BID 1',
                'major' => 'BID'
            ]
        ];

        return view('students.index', [
            'title' => $title ,
            'students' => $students
        ]);
    }

    public function create()
    {
        return view('students.create', [
            'title' => 'Sistem Sekolah - Tambah Siswa'
        ]);
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data siswa";
    }

    public function show(string $student)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        return view('students.show', [
            'title' => $title
        ]);
    }

    public function edit(string $student)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        return view('students.edit', [
            'title' => $title
        ]);
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