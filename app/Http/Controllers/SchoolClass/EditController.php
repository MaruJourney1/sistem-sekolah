<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass; // Sesuaikan dengan nama model kelas Anda (misal: Classroom / SchoolClass)
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke($id)
    {
        // Ambil data kelas berdasarkan ID
        $class = SchoolClass::findOrFail($id); 
        
        // Ambil data untuk dropdown
        $majors = Major::all();
        $teachers = Teacher::where('status', 'aktif')->get();

        return view('classes.edit', compact('class', 'majors', 'teachers'));
    }
}