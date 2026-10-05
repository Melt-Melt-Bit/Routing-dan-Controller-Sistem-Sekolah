<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    private const MAJORS = ['AKL', 'TKJ', 'BD'];

    public function index(): View
    {
        return view('students.index', [
            'title' => 'Sistem Sekolah - Daftar Siswa',
            'students' => Student::query()
                ->select(['id', 'nis', 'name', 'class', 'major'])
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function create(): View
    {
        return view('students.create', [
            'title' => 'Sistem Sekolah - Tambah Siswa',
            'majors' => self::MAJORS,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nis' => ['required', 'string', 'max:255', 'unique:students,nis'],
            'name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'major' => ['required', 'string', Rule::in(self::MAJORS)],
        ]);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Berhasil menambahkan data siswa baru.');
    }

    public function show(Student $student): View
    {
        return view('students.show', [
            'title' => 'Sistem Sekolah - Detail Siswa',
            'student' => $student,
        ]);
    }

    public function edit(Student $student): View
    {
        return view('students.edit', [
            'title' => 'Sistem Sekolah - Edit Siswa',
            'student' => $student,
            'majors' => self::MAJORS,
        ]);
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $request->validate([
            'nis' => ['required', 'string', 'max:255', Rule::unique('students', 'nis')->ignore($student)],
            'name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'major' => ['required', 'string', Rule::in(self::MAJORS)],
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Berhasil memperbarui data siswa.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Berhasil menghapus data siswa.');
    }
}
