<table class="table table-striped table-bordered fixed" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr style="text-align: center;">
            <th>Foto</th>
            <th>Pegawai</th>
            <th>Lokasi</th>
            <th>Waktu</th>
            <th>Keterangan</th>
            <th>Catatan</th>
            <?php if (session()->get('role') == 1 or session()->get('role') == 2) : ?>
                <th>Device</th>
                <th>Action</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($absensi as $a) : ?>
            <tr class="text-center">
                <td class="align-middle"><img src=" <?= base_url('uploads/absensi') . '/' . $a['foto']; ?>" width="150px" class="img-thumbnail"></td>
                <td class="align-middle"><b><?= $a['nama']; ?></b><br><?= $a['nip']; ?></td>
                <td class="align-middle">Lat: <?= $a['latitude']; ?><br>Lng: <?= $a['longitude']; ?></td>
                <td class="align-middle"><?= $a['created_at']; ?></td>
                <td class="align-middle"><?= $a['keterangan']; ?></td>
                <td class="align-middle"><?= $a['catatan']; ?></td>
                <?php if (session()->get('role') == 1 or session()->get('role') == 2) : ?>
                    <td class="align-middle"><?= $a['device']; ?></td>
                    <td class="align-middle">
                        <button class="btn btn-danger btn-sm" onclick="hapus(<?= $a['id']; ?>)"><i class="fa fa-trash"></i></button>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "columnDefs": [{
                "targets": 0,
                "orderable": false,
            }]
        });
    });

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
                    url: "<?= base_url('Absensi/hapus') ?>",
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
                            dataabsensi();
                        }
                    }
                });
            }
        })
    }
</script>