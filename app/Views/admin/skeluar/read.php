<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Nomor surat</th>
            <th>Dari</th>
            <th>Tanggal Keluar</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>

        <tr class="text-center">
            <td class="align-middle"><?= $no++; ?></td>
            <td class="align-middle">12/001/1</td>
            <td class="align-middle">Bandung</td>
            <td class="align-middle">12/03/2021</td>
            <td class="align-middle">
                <button class="btn btn-success btn-sm" onclick="detail()"><i class="fa fa-eye"></i></button>
                <button class="btn btn-warning btn-sm" onclick="edit()"><i class="fa fa-tags"></i></button>
                <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "columnDefs": [{
                "targets": [1, 6],
                "orderable": false,
            }]
        });
    });

    function detail() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('SuratKeluar/show_detail'); ?>",
            data: {

            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaldetail').modal('show');
                }
            }
        });
    }

    function edit() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('SuratKeluar/form_edit'); ?>",
            data: {

            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            }
        });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Hapus data?',
            text: `Apakah anda yakin menghapus data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('Pegawai/hapus') ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.sukses,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            datapegawai();
                            jumlahpegawai();
                            totalgaji();
                        }
                    }
                });
            }
        })
    }

    function gambar(id) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('Pegawai/form_upload'); ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupload').modal('show');
                }
            }
        });
    }
</script>