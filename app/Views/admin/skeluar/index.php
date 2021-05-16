<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Surat Keluar</h6>
    </div>
    <div class="ml-3 mt-2">
        <button type="button" class="btn btn-primary tomboltambah">
            <i class="fa fa-plus-circle"></i> Tambah Data
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="viewdata"></div>
        </div>
    </div>
</div>

<div class="viewmodal"></div>
<?= $this->endSection(); ?>

<?= $this->section('myscript'); ?>


<script>
    function dataproyek() {
        $.ajax({
            url: "<?= base_url('SuratKeluar/fetch_data'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }


    $(document).ready(function() {
        dataproyek();

        $('.tomboltambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('SuratKeluar/form_tambah'); ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();
                    $('#modaltambah').modal('show');
                }
            });
        });
    });
</script>



<?= $this->endSection(); ?>