<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['foto', 'username', 'id_pegawai', 'email', 'password', 'role_id', 'last_login'];
}
