<div class="modal fade" id="modaldetail" tabindex="-1" aria-labelledby="jabatanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Detail Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center class="mb-3">
                    <img class="img-thumbnail img-preview" width="50%" src="<?= base_url('uploads/pegawai') . '/' . $foto; ?>" alt="Foto Pegawai">
                </center>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">NIP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $nip; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">No. Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $telepon; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Jabatan</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" placeholder="<?= $jabatan; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Gaji Pokok</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="gaji" name="gaji" value="Rp. <?= number_format($gaji, 2, ',', '.'); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Mulai Bekerja</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="mulai" name="mulai" value="<?= $mulai; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Kepangkatan (TMT)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_kepangkatan" name="riwayat_kepangkatan" value="<?= $riwayat_Kepangkatan; ?>" readonly>
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Pendidikan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_pendidikan" name="riwayat_pendidikan" value="<?= $riwayat_pendidikan; ?>" readonly>
                        <div class="invalid-feedback errorRiwayat_pendidikan">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Struktural</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_struktural" name="diklat_struktural" value="<?= $diklat_struktural; ?>" readonly>
                        <div class="invalid-feedback errorDiklat_struktural">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Teknis</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_teknis" name="diklat_teknis" value="<?= $diklat_teknis; ?>" readonly>
                        <div class="invalid-feedback errorDiklat_teknis">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Fungsional</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_fungsional" name="diklat_fungsional" value="<?= $diklat_fungsional; ?>" readonly>
                        <div class="invalid-feedback errorDiklat_fungsional">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Jabatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_jabatan" name="riwayat_jabatan" value="<?= $riwayat_jabatan; ?>" readonly>
                        <div class="invalid-feedback errorRiwayat_jabatan">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tahun Pensiun</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="mulai" name="mulai" value="<?= $pensiun; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>