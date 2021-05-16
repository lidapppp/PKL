<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nip', 'latitude', 'longitude', 'catatan', 'foto', 'device', 'keterangan', 'created_at'];
}
