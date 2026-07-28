<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return "Menampilkan halaman utama major";
    }

    public function create()
    {
        return "Menampilkan halaman menambahkan major";
    }

    public function store(Request $request)
    {
        return "Membuat data baru";
    }

    public function show($id)
    {
        return "Menampilkan halaman detail dengan ID: {$id}";
    }

    public function edit($id)
    {
        return "Menampilkan halaman edit dengan ID: {$id}";
    }

    public function update(Request $request, $id)
    {
        return "Memperbarui data major dengan ID: {$id}";
    }

    public function destroy($id)
    {
        return "Menghapus data major dengan ID: {$id}";
    }
}