<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

// class StudentController extends Controller
// {
//     public function index() {
//         return"Ini adalah halaman daftar siswa";
//     }

//     public function show(string $id) {
//         return"Menampilkan detail siswa denan ID: $id";
//     }
// }

class StudentController extends Controller
{
    public function index() {
        $title = 'Sistem Sekolah-Daftar Siswa';
        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])->get();
        

        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function show(Student $student) {
        $title = 'Sistem Sekolah-Lembar siswa';
        return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function create() {
        $title = 'Sistem Sekolah-Catat Siswa Baru';
        return view('students.create', [
            'title' => $title,
        ]);
    }

    public function edit(Student $student) {
        $title = 'Sistem Sekolah-Ubah Data Siswa';
        return view('students.edit', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function store(StoreRequest $request) {
        // validasi
        $validatedRequest = $request->validated();

        // Tambahkan Data Ke Database
        // $student = new Student();
        // $student ->nis = $request->nis;
        // $student ->name = $request->name;
        // $student ->gender = $request->gender;
        // $student ->major = $request->major;
        // $student ->class = $request->class;
        // $student ->save();

        Student::create($validatedRequest);

        //Handle if Success
        return redirect()->route('students.index');
    }

    public function update(Student $student, UpdateRequest $request) {
        // validasi
        $validatedRequest = $request->validated();

        // Update Data
        $student->update($validatedRequest);

        // Handle if success

    }

    public function destroy(Student $student) {
    
    //delete data
    $student->delete();

    //handle if success
    return redirect()->route('students.index');
    }
}
