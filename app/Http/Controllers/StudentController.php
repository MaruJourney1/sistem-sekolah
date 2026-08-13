<?php

namespace App\Http\Controllers;

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
        $students = [
            [
                'id' => '1',
                'nis' => '1001',
                'name' => 'Mari',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ'
            ],

            [
                'id' => '2',
                'nis' => '2001',
                'name' => 'Maru',
                'class' => 'XII TKJ 2',
                'major' => 'TKJ'
            ],
        ];
        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function show(string $id) {
        $title = 'Sistem Sekolah-Lembar siswa';
        return view('students.show', [
            'title' => $title
        ]);
    }

    public function create() {
        $title = 'Sistem Sekolah-Catat Siswa Baru';
        return view('students.create', [
            'title' => $title,
        ]);
    }

    public function edit(string $id) {
        $title = 'Sistem Sekolah-Ubah Data Siswa';
        return view('students.edit', [
            'title' => $title,
        ]);
    }

    public function store() {
        return "Melakukan penambahan data siswa";
    }

    public function update(string $id) {
        return "Melakukan perubahan data siswa";
    }

    public function destroy(string $id) {
        return "Menghapus data siswa";
    }
}
