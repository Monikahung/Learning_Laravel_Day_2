<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserModel extends Model
{
    // Buat tabel protected bernama 'data_user'
    protected $table = 'data_user';

    // Buat kolom primary key protected bernama 'id'
    protected $id = 'id';
}
