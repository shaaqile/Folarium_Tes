<?php

namespace App\Models;

use CodeIgniter\Model;

class pegawaiModel extends Model
{

    protected $table = 'pegawai';
    protected $primaryKey = 'pegawai_id';
    protected $allowedFields = ['pegawai_name', 'jabatan_id', 'kontrak_id'];
}
