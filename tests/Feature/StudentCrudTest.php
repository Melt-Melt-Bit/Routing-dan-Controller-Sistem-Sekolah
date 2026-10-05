<?php

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
});

test('the student index lists students from the database', function () {
    Student::create([
        'nis' => '2024001',
        'name' => 'Budi Ariyanto',
        'class' => 'XII AKL 1',
        'major' => 'AKL',
    ]);

    $this->get(route('students.index'))
        ->assertSuccessful()
        ->assertSee('Budi Ariyanto')
        ->assertDontSee('John Doe');
});

test('a student can be created viewed updated and deleted', function () {
    $studentData = [
        'nis' => '2024001',
        'name' => 'Budi Ariyanto',
        'class' => 'XII AKL 1',
        'major' => 'AKL',
    ];

    $this->post(route('students.store'), $studentData)
        ->assertRedirect(route('students.index'))
        ->assertSessionHas('success');

    $student = Student::query()->firstOrFail();

    $this->get(route('students.show', $student))
        ->assertSuccessful()
        ->assertSee('Budi Ariyanto')
        ->assertSee('2024001');

    $this->get(route('students.edit', $student))
        ->assertSuccessful()
        ->assertSee('XII AKL 1');

    $updatedStudentData = [
        'nis' => $student->nis,
        'name' => 'Budi Santoso',
        'class' => 'XII TKJ 2',
        'major' => 'TKJ',
    ];

    $this->put(route('students.update', $student), $updatedStudentData)
        ->assertRedirect(route('students.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('students', [
        'id' => $student->id,
        'nis' => '2024001',
        'name' => 'Budi Santoso',
        'class' => 'XII TKJ 2',
        'major' => 'TKJ',
    ]);

    $this->delete(route('students.destroy', $student))
        ->assertRedirect(route('students.index'))
        ->assertSessionHas('success');

    $this->assertDatabaseMissing('students', ['id' => $student->id]);
});

test('student creation validates required fields and allowed majors', function () {
    $this->post(route('students.store'), [
        'nis' => '',
        'name' => '',
        'class' => '',
        'major' => 'INVALID',
    ])->assertSessionHasErrors(['nis', 'name', 'class', 'major']);

    $this->assertDatabaseCount('students', 0);
});

test('the student number must be unique except for the current student', function () {
    $firstStudent = Student::create([
        'nis' => '2024001',
        'name' => 'First Student',
        'class' => 'X AKL 1',
        'major' => 'AKL',
    ]);

    $secondStudent = Student::create([
        'nis' => '2024002',
        'name' => 'Second Student',
        'class' => 'X TKJ 1',
        'major' => 'TKJ',
    ]);

    $this->post(route('students.store'), [
        'nis' => $firstStudent->nis,
        'name' => 'Duplicate Student',
        'class' => 'X AKL 2',
        'major' => 'AKL',
    ])->assertSessionHasErrors('nis');

    $this->put(route('students.update', $secondStudent), [
        'nis' => $firstStudent->nis,
        'name' => 'Duplicate Student',
        'class' => 'X TKJ 2',
        'major' => 'TKJ',
    ])->assertSessionHasErrors('nis');
});
