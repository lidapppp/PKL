<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="pegawaiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Pegawai/simpan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">NIP</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nip" name="nip">
                        <div class="invalid-feedback errorNip">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">No. Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="telepon" name="telepon">
                        <div class="invalid-feedback errorTelepon">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="invalid-feedback errorEmail">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Level Jabatan</label>
                    <div class="col-sm-8">
                        <select class="form-select form-control" aria-label="Default select example" name="jabatan">
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?= $j['id_jabatan']; ?>"><?= $j['nama_jabatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Gaji Pokok</label>
                    <div class="col-sm-8">
                        <input type="number" min="0" class="form-control" id="gaji" name="gaji">
                        <div class="invalid-feedback errorGaji">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Mulai Bekerja</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="mulai" name="mulai">
                        <div class="invalid-feedback errorMulai">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Kepangkatan (TMT)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_kepangkatan" name="riwayat_kepangkatan">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Pendidikan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_pendidikan" name="riwayat_pendidikan">
                        <div class="invalid-feedback errorRiwayat_pendidikan">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Struktural</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_struktural" name="diklat_struktural">
                        <div class="invalid-feedback errorDiklat_struktural">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Teknis</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_teknis" name="diklat_teknis">
                        <div class="invalid-feedback errorDiklat_teknis">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Diklat Fungsional</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="diklat_fungsional" name="diklat_fungsional">
                        <div class="invalid-feedback errorDiklat_fungsional">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Riwayat Jabatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="riwayat_jabatan" name="riwayat_jabatan">
                        <div class="invalid-feedback errorRiwayat_jabatan">

                        </div>
                    </div>
                </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.formtambah').submit(function(e) {
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
                    $('.btnsimpan').html('<i class="fa fa-share-square"></i>  Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nip) {
                            $('#nip').addClass('is-invalid');
                            $('.errorNip').html(response.error.nip);
                        } else {
                            $('#nip').removeClass('is-invalid');
                            $('.errorNip').html('');
                        }
                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }
                        if (response.error.telepon) {
                            $('#telepon').addClass('is-invalid');
                            $('.errorTelepon').html(response.error.telepon);
                        } else {
                            $('#telepon').removeClass('is-invalid');
                            $('.errorTelepon').html('');
                        }
                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('.errorEmail').html(response.error.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('.errorEmail').html('');
                        }
                        if (response.error.gaji) {
                            $('#gaji').addClass('is-invalid');
                            $('.errorGaji').html(response.error.gaji);
                        } else {
                            $('#gaji').removeClass('is-invalid');
                            $('.errorGaji').html('');
                        }
                        if (response.error.mulai) {
                            $('#mulai').addClass('is-invalid');
                            $('.errorMulai').html(response.error.mulai);
                        } else {
                            $('#mulai').removeClass('is-invalid');
                            $('.errorMulai').html('');
                        }
                        if (response.error.riwayat_kepangkatan) {
                            $('#riwayat_kepangkatan').addClass('is-invalid');
                            $('.errorRiwayat_kepangkatan').html(response.error.riwayat_kepangkatan);
                        } else {
                            $('#riwayat_kepangkatan').removeClass('is-invalid');
                            $('.errorRiwayat_kepangkatan').html('');
                        }
                        if (response.error.riwayat_pendidikann) {
                            $('#riwayat_pendidikan').addClass('is-invalid');
                            $('.errorRiwayat_pendidikan').html(response.error.riwayat_pendidikan);
                        } else {
                            $('#riwayat_pendidikan').removeClass('is-invalid');
                            $('.errorRiwayat_pendidikan').html('');
                        }
                        if (response.error.diklat_struktural) {
                            $('#diklat_struktural').addClass('is-invalid');
                            $('.errorDiklat_struktural').html(response.error.diklat_struktural);
                        } else {
                            $('#diklat_struktural').removeClass('is-invalid');
                            $('.errorDiklat_struktural').html('');
                        }
                        if (response.error.diklat_teknis) {
                            $('#diklat_teknis').addClass('is-invalid');
                            $('.errorDiklat_teknis').html(response.error.diklat_teknis);
                        } else {
                            $('#diklat_teknis').removeClass('is-invalid');
                            $('.errorDiklat_teknis').html('');
                        }
                        if (response.error.diklat_fungsional) {
                            $('#diklat_fungsional').addClass('is-invalid');
                            $('.errorDiklat_fungsional').html(response.error.diklat_fungsional);
                        } else {
                            $('#diklat_fungsional').removeClass('is-invalid');
                            $('.errorDiklat_fungsional').html('');
                        }
                        if (response.error.riwayat_jabatan) {
                            $('#riwayat_jabatan').addClass('is-invalid');
                            $('.errorRiwayat_jabatan').html(response.error.riwayat_jabatan);
                        } else {
                            $('#riwayat_jabatan').removeClass('is-invalid');
                            $('.errorRiwayat_jabatan').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil...',
                            text: response.sukses,
                        });

                        $('#modaltambah').modal('hide');
                        datapegawai();
                        jumlahpegawai();
                        totalgaji();
                    }
                }
            });
        });
    });
</script>