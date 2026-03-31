<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::all();
        return view('jurusan.index', compact('data'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required'
        ]);

        Jurusan::create($request->all());

        return redirect('/jurusan');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jurusan' => 'required'
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());

        return redirect('/jurusan');
    }

    public function destroy($id)
    {
        Jurusan::destroy($id);
        return redirect('/jurusan');
    }
}
