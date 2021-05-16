<?php

namespace App\Controllers;

class Pegawai extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SIK - Pegawai",
            'head' => "Pegawai"
        ];

        return view('admin/pegawai/index', $data);
    }

    public function fetch_data()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'pegawai' => $this->PegawaiModel->join('jabatan', 'jabatan.id_jabatan = pegawai.jabatan')->get()->getResultArray()
            ];
            $msg = [
                'data' => view('admin/pegawai/read', $data)
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function getJumlah()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'jumlah' => $this->PegawaiModel->selectCount('id_pegawai')->get()->getRowArray()
            ];
            $msg = [
                'data' => $data['jumlah']['id_pegawai']
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function getGaji()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = [
                'jumlah' => $this->PegawaiModel->selectSum('gaji_pokok')->get()->getRowArray()
            ];
            $msg = [
                'data' => number_format($data['jumlah']['gaji_pokok'], 2, ',', '.')
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

            $jabatan = $this->JabatanModel->findAll();
            $data['jabatan'] = $jabatan;

            $msg = [
                'data' => view('admin/pegawai/create', $data)
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
                ],
                'riwayat_kepangkatan' => [
                    'label' => 'Riwayat Kepangkatan (TMT)',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'riwayat_pendidikan' => [
                    'label' => 'Riwayat Pendidikan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'diklat_struktural' => [
                    'label' => 'Diklat Struktural',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'diklat_teknis' => [
                    'label' => 'Diklat Teknis',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'diklat_fungsional' => [
                    'label' => 'Diklat Fungsional',
                ],
                'riwayat_jabatan' => [
                    'label' => 'Riwayat Jabatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],




            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nip'       => $validation->getError('nip'),
                        'nama'      => $validation->getError('nama'),
                        'telepon'   => $validation->getError('telepon'),
                        'email'     => $validation->getError('email'),
                        'gaji'      => $validation->getError('gaji'),
                        'mulai'     => $validation->getError('mulai'),
                        'riwayat_kepangkatan' => $validation->getError('Riwayat Kepangkatan (TMT)'),
                        'riwayat_pendidikan' => $validation->getError('Riwayat Pendidikan '),
                        'diklat_struktural' => $validation->getError('Diklat Struktural'),
                        'diklat_teknis' => $validation->getError('Diklat Teknis'),
                        'diklat_fungsional' => $validation->getError('Diklat Fungsional'),
                        'riwayat_jabatan' => $validation->getError('Riwayat Jabatan'),
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
                    'riwayat_kepangkatan' => $request->getVar('Riwayat Kepangkatan (TMT)'),
                    'riwayat_pendidikan' => $request->getVar('Riwayat Pendidikan '),
                    'diklat_struktural' => $request->getVar('Diklat Struktural'),
                    'diklat_teknis' => $request->getVar('Diklat Teknis'),
                    'diklat_fungsional' => $request->getVar('Diklat Fungsional'),
                    'riwayat_jabatan' => $request->getVar('Riwayat Jabatan'),
                    'foto'          => "default.png",
                    'created_at'    => date('Y-m-d')
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

    public function form_upload()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {

            $id = $request->getVar('id');
            $row = $this->PegawaiModel->find($id);

            $data = [
                'id' => $row['id_pegawai'],
                'foto' => $row['foto']
            ];

            $msg = [
                'sukses' => view('admin/pegawai/upload', $data)
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function doupload()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'foto' => [
                    'label' => 'Foto Pegawai',
                    'rules' => 'uploaded[foto]|max_size[foto, 1024]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
                    'errors' => [
                        'uploaded'  => '{field} belum diupload',
                        'max_size'  => 'Ukuran {field} Melebihi 1 MB',
                        'mime_in'   => 'File yang diupload harus gambar!',
                        'is_image'  => 'File yang diupload harus gambar!'
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto' => $validation->getError('foto')
                    ]
                ];
            } else {

                $id = $request->getVar('id');
                $cekdata = $this->PegawaiModel->find($id);
                $fotolama = $cekdata['foto'];

                if ($fotolama != 'default.png') {
                    unlink('uploads/pegawai' . '/' . $fotolama);
                    unlink('uploads/pegawai/thumb' . '/thumb_' . $fotolama);
                }

                $filegambar = $request->getFile('foto');

                $updatedata = [
                    'foto' => $filegambar->getName()
                ];

                $this->PegawaiModel->update($id, $updatedata);

                \Config\Services::image()
                    ->withFile($filegambar)
                    ->fit(800, 533, 'center')
                    ->save('uploads/pegawai/thumb/' . 'thumb_' .  $filegambar->getName());
                $filegambar->move('uploads/pegawai');
                $msg = [
                    'sukses' => 'Gambar berhasil diupload!'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function form_edit()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {

            $id = $request->getVar('id');
            $row = $this->PegawaiModel->find($id);

            $jabatan = $this->JabatanModel->findAll();

            $data = [
                'id' => $row['id_pegawai'],
                'nip' => $row['nip'],
                'nama' => $row['nama'],
                'telepon' => $row['telepon'],
                'email' => $row['email'],
                'jabatan' => $row['jabatan'],
                'riwayat_Kepangkatan' => $row['riwayat_kepangkatan'],
                'riwayat_pendidikan' => $row['riwayat_pendidikan'],
                'diklat_struktural' => $row['diklat_struktural'],
                'diklat_teknis' => $row['diklat_teknis'],
                'diklat_fungsional' => $row['diklat_fungsional'],
                'riwayat_jabatan' => $row['riwayat_jabatan'],
                'gaji' => $row['gaji_pokok'],
                'mulai' => $row['mulai_bekerja'],
                'nama_jabatan' => $jabatan
            ];

            $msg = [
                'sukses' => view('admin/pegawai/update', $data)
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function edit()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $simpandata = [
                'nip'           => $request->getVar('nip'),
                'nama'          => $request->getVar('nama'),
                'telepon'       => $request->getVar('telepon'),
                'email'         => $request->getVar('email'),
                'gaji_pokok'    => $request->getVar('gaji'),
                'mulai_bekerja' => $request->getVar('mulai'),
                'jabatan'       => $request->getVar('jabatan'),
                'riwayat_kepangkatan' => $request->getVar('riwayat_kepangkatan'),
                'riwayat_pendidikan' => $request->getVar('riwayat_pendidikan'),
                'diklat_struktural' => $request->getVar('diklat_struktural'),
                'diklat_teknis' => $request->getVar('diklat_teknis'),
                'diklat_fungsional' => $request->getVar('diklat_fungsional'),
                'riwayat_jabatan' => $request->getVar('riwayat_jabatan'),


            ];

            $id = $request->getVar('id');

            $this->PegawaiModel->update($id, $simpandata);
            $msg = [
                'sukses' => 'Data berhasil diupdate'
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

            $id = $request->getVar('id');
            $row = $this->PegawaiModel->join('jabatan', 'jabatan.id_jabatan = pegawai.jabatan')->where('id_pegawai', $id)->get()->getRowArray();
            $tahun = str_split($row['nip'], 4)[0] + 60;
            $bulan = str_split($row['nip'], 2)[2] + 1;
            if ($bulan < 10) {
                $bulan = '0'  . $bulan;
            }
            $tanggal = $tahun . '-' . $bulan . '-01';
            $date = date_create($tanggal);
            if (date_format($date, "l") == "saturday") {
                $tanggal = $tahun . '-' . $bulan . '-03';
            } else if (date_format($date, "l") == "sunday") {
                $tanggal = $tahun . '-' . $bulan . '-02';
            }
            $data = [
                'id'        => $row['id_pegawai'],
                'nip'       => $row['nip'],
                'nama'      => $row['nama'],
                'telepon'   => $row['telepon'],
                'email'     => $row['email'],
                'jabatan'   => $row['nama_jabatan'],
                'riwayat_Kepangkatan' => $row['riwayat_kepangkatan'],
                'riwayat_pendidikan' => $row['riwayat_pendidikan'],
                'diklat_struktural' => $row['diklat_struktural'],
                'diklat_teknis' => $row['diklat_teknis'],
                'diklat_fungsional' => $row['diklat_fungsional'],
                'riwayat_jabatan' => $row['riwayat_jabatan'],
                'gaji'      => $row['gaji_pokok'],
                'mulai'     => $row['mulai_bekerja'],
                'foto'      => $row['foto'],
                'pensiun'   => $tanggal,
            ];

            $msg = [
                'sukses' => view('admin/pegawai/detail', $data)
            ];

            echo json_encode($msg);
        } else {
            exit(view('error'));
        }
    }

    public function hapus()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {

            $id = $request->getVar('id');

            $cekdata = $this->PegawaiModel->find($id);
            $fotolama = $cekdata['foto'];
            if ($fotolama != "default.png") {
                unlink('uploads/pegawai' . '/' . $fotolama);
                unlink('uploads/pegawai/thumb' . '/thumb_' . $fotolama);
            }

            $this->PegawaiModel->delete($id);

            $msg = [
                'sukses' => 'Data berhasil dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
