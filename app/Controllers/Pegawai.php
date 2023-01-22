<?php

namespace App\Controllers;

use App\Models\jabatanModel;
use App\Models\kontrakModel;
use App\Models\pegawaiModel;

class Pegawai extends BaseController
{

    protected $pegawaiModel;
    protected $jabatanModel;
    protected $kontrakModel;
    public function __construct()
    {
        $this->pegawaiModel = new pegawaiModel();
        $this->jabatanModel = new jabatanModel();
        $this->kontrakModel = new kontrakModel();
    }
    public function index()
    {

        $jabatan = $this->jabatanModel->findAll();
        $kontrak = $this->kontrakModel->findAll();

        $data = [
            'jabatan' => $jabatan,
            'kontrak' => $kontrak,
            'validation' => \Config\Services::validation()
        ];

        return view('input', $data);
    }

    public function addPegawai()
    {
        // if ($this->request->isAJAX()) {
        // if (!$this->validate([
        //     'nama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Harus diisi'
        //         ]
        //     ],
        //     'jabatan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Harus diisi'
        //         ]
        //     ],
        //     'kontrak' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Harus diisi'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->back()->withInput();
        // }

        $nama = $this->request->getVar('nama');
        $jabatan = $this->request->getVar('jabatan');
        $kontrak = $this->request->getVar('kontrak');

        $add = $this->pegawaiModel->insert([
            'pegawai_name' => $nama,
            'jabatan_id' => $jabatan,
            'kontrak_id' => $kontrak
        ]);

        if ($add) {
            return redirect()->to(base_url('/'));
        }
    }
    //}

    public function updatePage($id)
    {
        // $pegawai = $this->pegawaiModel->where('pegawai_id', $id)->first();

        $pegawai = $this->pegawaiModel->join('jabatan', 'jabatan.jabatan_id=pegawai.jabatan_id')->join('kontrak', 'kontrak.kontrak_id=pegawai.kontrak_id')->where('pegawai_id', $id)->find();
        $jabatan = $this->jabatanModel->findAll();
        $kontrak = $this->kontrakModel->findAll();

        $data = [
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
            'kontrak' => $kontrak,
            'validation' => \Config\Services::validation()
        ];

        return view('input', $data);
    }

    public function updatePegawai($id)
    {
        // if ($this->request->isAJAX()) {
        // if (!$this->validate([
        //     'nama' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Harus diisi'
        //         ]
        //     ],
        //     'jabatan' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Harus diisi'
        //         ]
        //     ],
        //     'kontrak' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Harus diisi'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->back()->withInput();
        // }

        $nama = $this->request->getVar('nama');
        $jabatan = $this->request->getVar('jabatan');
        $kontrak = $this->request->getVar('kontrak');

        $update = $this->pegawaiModel->update($id, [
            'pegawai_name' => $nama,
            'jabatan_id' => $jabatan,
            'kontrak_id' => $kontrak
        ]);

        if ($update) {
            return redirect()->to(base_url('/'));
        }
    }

    public function deletePegawai($id)
    {
        $delete = $this->pegawaiModel->delete($id);

        if ($delete) {
            return redirect()->back();
        }
    }
}
