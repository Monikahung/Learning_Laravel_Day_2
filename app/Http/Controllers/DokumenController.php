<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    // Function index untuk menampilkan data dari tabel dokumen
    public function index(){
        $dokumens = Dokumen::all();
        return view('dokumen.index', compact('dokumens'));
    }

    // Function create untuk menampilkan form tambah dokumen
    public function create(){
        // Direct ke halaman form tambah dokumen
        return view('dokumen.create');
    }

    // Function store untuk memproses penyimpanan data dokumen
    public function store(Request $request){
        // Validasi data
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:2048'
        ]);

        // Variabel menunjukkan data mau diupload di folder mana
        $filePath = $request->file('file')->store('doc', 'public');

        // Simpan data ke tabel dokumen melalui model Dokumen
        Dokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'file' => $filePath
        ]);

        // Direct ke halaman index dokumen
        return redirect()->route('dokumen.index')->with('success', 'Dokumen Berhasil Ditambahkan');
    }

    // Function edit untuk menampilkan form edit dokumen
    public function edit($id){
        // Ambil data dokumen pertama sesuai dengan id yang dipilih
        $doc = Dokumen::where('id', $id)->first();

        // Variabel array penampung data yang diambil
        $data = [
            'dokumen' => $doc
        ];

        // Direct ke halaman form edit dokumen
        return view('dokumen.edit', $data);
    }

    // Function store untuk memproses perubahan data dokumen
    public function update(Request $request, $id){
        // Validasi data
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'file' => 'file|mimes:pdf|max:2048'
        ]);

        // Ambil data dokumen dari database
        $dokumen = Dokumen::find($id);

        // Jika data tidak ditemukan
        if(!$dokumen){
            // Direct ke halaman index dokumen
            return redirect()->route('dokumen.index')->with('error', 'Data Tidak Ditemukan');
        }

        // Jika data ditemukan dan ada file baru
        if($request->hasFile('file')){
            // Jika file dokumen dan storagenya ditemukan
            if($dokumen->file && Storage::disk('public')->exists($dokumen->file)){
                // Lakukan penghapusan file lama di storage
                Storage::disk('public')->delete($dokumen->file);
            }

            // Ambil filePath baru
            $filePath = $request->file('file')->store('doc', 'public');

            // Simpan data ke filePath
            $dokumen->file = $filePath;
        }

        // Upload data ke tabel dokumen di database
        $dokumen->nama_dokumen = $request->nama_dokumen;
        $dokumen->save();

        // Direct ke halaman index dokumen
        return redirect()->route('dokumen.index')->with('success', 'Dokumen Berhasil Diupdate');
    }

    // Function delete untuk menghapus data dokumen
    public function delete($id){
        // Ambil file lama dari database, tabel dokumen, pilih field file, dimana id dokumen sama dengan $id yang dipilih
        $fileLama = DB::table('dokumen')->select('file')->where('id', $id)->get();

        // Perulangan untuk menampung file lama
        foreach($fileLama as $f1){
            $fileLama = $f1->file;
        }

        // Variabel filePath
        $filePath = $fileLama;

        // Menghapus file di storage
        Storage::disk('public')->delete($filePath);

        // Menghapus data dokumen di database
        Dokumen::where('id', $id)->delete();

        // Direct ke halaman index dokumen
        return redirect()->route('dokumen.index')->with('success', 'Dokumen Berhasil Dihapus');
    }
}
