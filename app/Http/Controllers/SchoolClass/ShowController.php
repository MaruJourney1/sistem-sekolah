<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        return "Menampilkan detail kelas dengan ID: {$id}";
    }
}