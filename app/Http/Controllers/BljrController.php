<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class BljrController extends Controller
{
    // Function tampil untuk menampilkan teks "Hello"
    function tampil(){
        return "Hello";
    }

    // Function tampil2 untuk menampilkan teks "Hellllloooo"
    function tampil2(){
        return "Hellllloooo";
    }

    // Function tampil3 untuk menampilkan viwe cobaview
    function tampil3(){
        return view('cobaview');
    }

    // Function tampil4 untuk menampilkan viwe cobaviewhome yang berada di dalam folder home
    function tampil4(){
        return view('home.cobaviewhome');
    }

    // ADMIN LTE
    // Function tampiladmin untuk menampilkan view dashboard yang berada di dalam folder admin
    function tampiladmin(){
        return view('admin.dashboard');
    }

    // Function login untuk menampilkan view login yang berada di dalam folder admin
    function login(){
        return view('admin.login');
    }

    // Function listbarang untuk menampilkan view databarang yang berada di dalam folder admin (tabel)
    function listbarang(){
        return view('admin.databarang');
    }

    // Function fhitung untuk menampilkan view formhitung yang berada di dalam folder admin (form penjumlahan)
    function fhitung(){
        return view('admin.formhitung');
    }

    // Function calculate untuk menerima data dari formhitung, melakukan validasi, dan mengembalikan hasil penjumlahan dari angka1 dan angka2
    function calculate(Request $request){
        // Validasi input angka1 dan angka2, wajib diisi dan harus berupa angka
        $request->validate([
            'angka1' => 'required|numeric',
            'angka2' => 'required|numeric',
        ]);

        // Mengambil nilai angka1 dan angka2 dari request
        $number1 = $request->input('angka1');
        $number2 = $request->input('angka2');

        // Melakukan penjumlahan dari angka1 dan angka2
        $result = $number1 + $number2;

        // Mengembalikan view formhitung dengan data angka1, angka2, dan hasil penjumlahan
        return view('admin.formhitung', compact('number1', 'number2', 'result'));
    }

    // Function fregister untuk menampilkan view formregister yang berada di dalam folder admin (form registrasi) dan terdapat data dari tabel 'data_user' dari database
    function fregister(){
        // Mengambil semua data dari UserModel
        $users = UserModel::all();
        return view('admin.formregister', compact('users'));
    }

    // Function daftar untuk menerima data dari formregister, melakukan validasi, memasukkan data ke dalam tabel 'data_user' melalui UserModel, dan mengembalikan pesan sukses jika pendaftaran berhasil
    function daftar(Request $request){
        // Validasi input nama, email, dan password
        $request->validate([
            // Nama wajib diisi, minimal 5 karakter, tipe data string, dan maksimal 255 karakter
            'nama' => 'required|min:5|string|max:255',
            // No HP wajib diisi, minimal 5 karakter, tipe data string, dan maksimal 255 karakter
            'no_hp' => 'required|min:5|string|max:255',
            // Email wajib diisi, tipe data email, dan harus unik di tabel users pada kolom email
            'email' => 'required|email|unique:users,email',
            // Password wajib diisi, minimal 6 karakter, dan harus sama dengan input password_confirmation
            'password' => 'required|min:6|confirmed',
        ]);

        // Variabel dataInsert yang berisi field-field untuk dimasukkan ke dalam tabel 'data_user'
        $dataInsert = [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // Masukkan data ke dalam database melalui model UserModel
        UserModel::insert($dataInsert);

        // Jika validasi berhasil, data akan diproses dan kemudian diarahkan kembali ke formregister dengan pesan sukses
        return redirect()->route('formregister')->with('success', 'Pendaftaran berhasil');
    }

    // Function editUser untuk mengambil data berdasarkan id dari tabel 'data_user' dan menampungnya ke dalam array, lalu mengembalikannya ke view edituser.blade.php
    function editUser($id){
        // Mengambil data user berdasarkan id
        $users = UserModel::where('id', $id)->first();

        // Tampung data ke dalam array
        $data = [
            'user' => $users
        ];

        return view('admin.edituser', $data);
    }

    // Function updateUser untuk mengambil data yang dikirim dan menampungnya ke dalam array, lalu memperbarui datanya berdasarkan id dan mengembalikannya ke view formregister.blade.php
    function updateUser(Request $request, $id){
        // Ambil nilai yang dikirim
        $nama = $request->input('nama');
        $no_hp = $request->input('no_hp');
        $email = $request->input('email');
        $password = $request->input('password');

        // Tampung data ke dalam array
        $dataUpdate = [
            'nama' => $nama,
            'no_hp' => $no_hp,
            'email' => $email,
        ];

        // Jika password diinput pengguna, maka juga diupdate
        if ($password){
            $dataUpdate['password'] = Hash::make($password);
        }

        // Perbarui data berdasarkan id
        UserModel::where('id', $id) -> update($dataUpdate);

        // Direct ke route formregister
        return redirect()->route('formregister')->with('success', 'Data Berhasil Diubah');
    }

    // Function deleteUser untuk menemukan data user berdasarkan id, kemudian menghapusnya dari database dan mengembalikan ke view formregister.blade.php
    function deleteUser($id){
        // Menemukan data user berdasarkan id
        $user = UserModel::findOrFail($id);
        
        // Menghapus data user dari database
        $user->delete();
        
        // Direct ke route formregister
        return redirect()->route('formregister')->with('success', 'Data Berhasil Dihapus');
    }

    // Function listgempa untuk menampilkan view datagempa yang berada di dalam folder admin dengan data gempa terkini yang diambil dari API BMKG
    function listgempa(){
        // Parsing url API BMKG untuk mendapatkan data gempa terkini
        $url = 'https://data.bmkg.go.id/DataMKG/TEWS/gempaterkini.json';

        // Mengambil data berdasarkan konten dari url
        $json = file_get_contents($url);

        // Mengubah data JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Mengambil data gempa dari array yang telah diparsing, jika data gempa tidak tersedia maka akan mengembalikan array kosong
        $gempaData = $data['Infogempa']['gempa'] ?? [];

        // Mengembalikan view datagempa yang berada di dalam folder admin dengan data gempa yang telah diparsing
        return view('admin.datagempa', compact('gempaData'));
    }
}