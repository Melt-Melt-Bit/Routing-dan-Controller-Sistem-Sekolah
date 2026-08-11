<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Dummy data source for teachers. Will be replaced by the Teacher model/database on the next TP.
     */
    private function getTeachers(): array
    {
        return [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ],
        ];
    }

    public function index()
    {
        $title = "Sistem Sekolah - Daftar Guru";
        $teachers = $this->getTeachers();

        return view('teachers.index', [
            'title' => $title,
            'teachers' => $teachers,
        ]);
    }

    public function create()
    {
        return view('teachers.create', [
            'title' => 'Sistem Sekolah - Tambah Guru',
        ]);
    }

    public function store(Request $request)
    {
        return "Melakukan penambahan data guru";
    }

    public function show(string $teacher)
    {
        $data = collect($this->getTeachers())->firstWhere('id', (int) $teacher);

        return view('teachers.show', [
            'title' => 'Sistem Sekolah - Detail Guru',
            'teacher' => $data,
        ]);
    }

    public function edit(string $teacher)
    {
        $data = collect($this->getTeachers())->firstWhere('id', (int) $teacher);

        return view('teachers.edit', [
            'title' => 'Sistem Sekolah - Edit Guru',
            'teacher' => $data,
        ]);
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
