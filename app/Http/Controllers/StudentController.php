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
    public function index(Request $request) {
        $title = 'Sistem Sekolah-Daftar Siswa';

        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
        ->when($search, function($query, $search) {
            $query->where(function($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
            ->orwhere('nis', 'like', "%{$search}%");
            });
        })->when($class, fn($query, $class) => $query->where('class', '=', $class))
        ->when($major, fn($query, $major) => $query->where('class', '=', $major))
        ->paginate(10)->withQueryString();

        $schoolsclasses = ['10 AKL', '11 AKL', '12 AKL', '10 BiD', '11 BiD', '12 BiD', '10 TKJ 1', '11 TKJ 1', '12 TKJ 1', '10 TKJ 2', '11 TKJ 2', '12 TKJ 2', '10 TKJ 3', '11 TKJ 3', '12 TKJ 3', ];
        $majors = ['AKL', 'BiD', 'TKJ'];

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'schoolsclasses' => $schoolsclasses,
            $majors => $majors
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
