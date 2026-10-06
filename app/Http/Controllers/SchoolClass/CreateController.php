<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(Request $request)
    {
        // Ambil semua data jurusan
        $majors = Major::all();
        
        // Ambil data guru yang aktif saja untuk wali kelas
        $teachers = Teacher::where('status', 'aktif')->get(); 

        return view('classes.create', compact('majors', 'teachers'));
    }
}