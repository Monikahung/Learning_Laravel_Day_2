<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    // Buat tabel protected bernama 'dokumen'
    protected $table = 'dokumen';

    // Buat field protected dari tabel 'dokumen'
    protected $fillable = ['nama_dokumen', 'file'];
}
