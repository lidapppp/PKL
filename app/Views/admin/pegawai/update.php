<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="jabatanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Edit Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Pegawai/edit', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="text" name="id" id="id" value="<?= $id; ?>" hidden>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">NIP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $nip; ?>">
                        <div class="invalid-feedback errorNip">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">No. Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $telepon; ?>">
                        <div class="invalid-feedback errorTelepon">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
                        <div class="invalid-feedback errorEmail">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Level Jabatan</label>
                    <div class="col-sm-8">
                        <select class="form-select form-control" aria-label="Default select example" name="jabatan">
                            <?php foreach ($nama_jabatan as $j) : ?>
                                <option value="<?= $j['id_jabatan']; ?>" <?php if ($j['id_jabatan'] == $jabatan) echo 'selected'; ?>><?= $j['nama_jabatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Gaji Pokok</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" class="form-control" id="gaji" name="gaji" value="<?= $gaji; ?>">
                        <div class="invalid-feedback errorGaji">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Mulai Bekerja</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="mulai" name="mulai" value="<?= $mulai; ?>">
                        <div class="invalid-feedback errorMulai">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Kepangkatan (TMT)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_kepangkatan" name="riwayat_kepangkatan" value="<?= $riwayat_Kepangkatan; ?>">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Pendidikan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_pendidikan" name="riwayat_pendidikan" value="<?= $riwayat_pendidikan; ?>">
                        <div class="invalid-feedback errorRiwayat_pendidikan">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Struktural</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_struktural" name="diklat_struktural" value=" <?= $diklat_struktural; ?>">
                        <div class="invalid-feedback errorDiklat_struktural">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Teknis</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_teknis" name="diklat_teknis" value="<?= $diklat_teknis; ?>">
                        <div class="invalid-feedback errorDiklat_teknis">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Fungsional</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_fungsional" name="diklat_fungsional" value="<?= $diklat_fungsional; ?>">
                        <div class="invalid-feedback errorDiklat_fungsional">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Jabatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_jabatan" name="riwayat_jabatan" value="<?= $riwayat_jabatan; ?>">
                        <div class="invalid-feedback errorRiwayat_jabatan">

                        </div>
                    </div>
                </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Update</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formedit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disable');
                    $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable', 'disable');
                    $('.btnsimpan').html('<i class="fa fa-share-square"></i>  Update');
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil...',
                        text: response.sukses,
                    });

                    $('#modaledit').modal('hide');
                    datapegawai();
                    jumlahpegawai();
                    totalgaji();
                }
            });
        });
    });
</script>