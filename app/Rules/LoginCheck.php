<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    // Variabel $request diprotect
    protected $request;

    // Buat construct
    public function __construct($request){
        $this->request = $request;
    }

    // Fungsi validate
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Variabel penyimpan data email dan password yang diinput
        $email = $this->request->input('email');
        $pass = $this->request->input('password');

        // Status login awalnya false
        $loginStatus = false;

        // Mengecek email apakah ada di dalam database melalui UserModel
        $cekemail = UserModel::where('email', $email)->count();

        if ($cekemail > 0){
            // Mengambil password dari database berdasarkan email yang ditemukan
            $adminPass = UserModel::where('email', $email)->value('password');

            // Cocokkan antara password yang diambil dengan yang diinput oleh pengguna saat login
            if(Hash::check($pass, $adminPass)){
                $loginStatus = TRUE;
            }
        }

        // Jika $loginStatus bernilai TRUE
        if ($loginStatus) {
            // Ambil data user untuk dijadikan session
            $ambilUser = UserModel::where('email', $email)->first();
            // Ubah session loginStatus jadi TRUE
            Session::put('loginStatus', TRUE);
            // Ubah session ambilUser dengan data dari $ambilUser
            Session::put('ambilUser', $ambilUser);
        } else {
            // Jika gagal
            $fail ("Email dan password salah");
        }
    }
}
