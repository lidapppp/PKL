<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Judul</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Tanggal masuk</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>

        <tr class="text-center">
            <td class="align-middle"><?= $no++; ?></td>
            <td class="align-middle">Pembangunan Bandung</td>
            <td class="align-middle"> <img src="https://i.pinimg.com/736x/6e/f9/17/6ef917a976a533edf37c8e9b1948d2f1.jpg" width="100" height="80"></td>
            <td class="align-middle">Pembangunan pada saat pandemi merupakan...</td>
            <td class="align-middle">31/12/2020</td>
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
            url: "<?= base_url('News/show_detail'); ?>",
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
            url: "<?= base_url('News/form_edit'); ?>",
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