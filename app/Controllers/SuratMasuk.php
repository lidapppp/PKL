<?php

namespace App\Controllers;

class SuratMasuk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SIK - Surat Masuk",
            'head' => "Arsip Surat"
        ];

        return view('admin/smasuk/index', $data);
    }

    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $msg = [
                'data' => view('admin/smasuk/read')
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }


    public function form_tambah()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {


            $msg = [
                'data' => view('admin/smasuk/create')
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function simpan()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nip' => [
                    'label' => 'NIP',
                    'rules' => 'required|is_unique[pegawai.nip]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tersebut sudah ada'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'telepon' => [
                    'label' => 'Nomor Telepon',
                    'rules' => 'required|is_unique[pegawai.telepon]|integer',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tersebut sudah ada',
                        'integer' => '{field} salah'
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|is_unique[pegawai.email]|valid_email',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} tersebut sudah ada',
                        'valid_email' => '{field} salah'
                    ]
                ],
                'gaji' => [
                    'label' => 'Gaji',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'mulai' => [
                    'label' => 'Tanggal Mulai Bekerja',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nip'       => $validation->getError('nip'),
                        'nama'      => $validation->getError('nama'),
                        'telepon'   => $validation->getError('telepon'),
                        'email'     => $validation->getError('email'),
                        'gaji'      => $validation->getError('gaji'),
                        'mulai'     => $validation->getError('mulai')
                    ]
                ];
            } else {
                $simpandata = [
                    'nip'           => $request->getVar('nip'),
                    'nama'          => $request->getVar('nama'),
                    'telepon'       => $request->getVar('telepon'),
                    'email'         => $request->getVar('email'),
                    'gaji_pokok'    => $request->getVar('gaji'),
                    'mulai_bekerja' => $request->getVar('mulai'),
                    'jabatan'       => $request->getVar('jabatan'),
                    'foto'          => "default.png"
                ];
                $this->PegawaiModel->insert($simpandata);

                $userdata = [
                    'foto' => "default.png",
                    'username' => $request->getVar('nip'),
                    'email' => $request->getVar('email'),
                    'password' => password_hash($request->getVar('nip'), PASSWORD_DEFAULT),
                    'role_id' => 4,
                    'id_pegawai' => $this->PegawaiModel->insertID()
                ];
                $this->UserModel->insert($userdata);

                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }
    public function form_edit()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {


            $msg = [
                'sukses' => view('admin/smasuk/update')
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }
    public function show_detail()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {


            $msg = [
                'sukses' => view('admin/smasuk/detail')
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }
}
