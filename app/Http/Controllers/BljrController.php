<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    function listbarang(){
        return view('admin.databarang');
    }
}