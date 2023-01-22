<?php

namespace App\Controllers;

use App\Models\pegawaiModel;
use App\Controllers\BaseController;

class Home extends BaseController
{

    protected $pegawaiModel;
    public function __construct()
    {
        $this->pegawaiModel = new pegawaiModel();
    }
    public function index()
    {

        return view('master');
    }

    public function pegawaidata()
    {
        if ($this->request->isAJAX()) {
            $pegawai = $this->pegawaiModel->join('jabatan', 'jabatan.jabatan_id=pegawai.jabatan_id')->join('kontrak', 'kontrak.kontrak_id=pegawai.kontrak_id')->find();

            // dd($pegawai);

            $data = [
                'pegawai' => $pegawai
            ];

            $msg = [
                'data' => view('dataPegawai', $data)
            ];

            echo json_encode($msg);
        }
    }
}
