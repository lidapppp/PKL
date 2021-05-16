<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['nip', 'foto', 'nama', 'telepon', 'email', 'jabatan', 'riwayat_kepangkatan', 'riwayat_pendidikan', 'diklat_struktural', 'diklat_teknis', 'diklat_fungsional', 'riwayat_jabatan', 'gaji_pokok', 'mulai_bekerja', 'created_at'];
}
