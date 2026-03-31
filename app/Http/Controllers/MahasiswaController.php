<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::with('jurusan')->get();
        return view('mahasiswa.index', compact('data'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('mahasiswa.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        $jurusan = Jurusan::all();
        return view('mahasiswa.edit', compact('mhs', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->update($request->all());
        return redirect('/mahasiswa');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}
