<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total User</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="viewjumlah"></span> User</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-id-card-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
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
    function datauser() {
        $.ajax({
            url: "<?= base_url('User/fetch_data'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    function jumlahuser() {
        $.ajax({
            url: "<?= base_url('User/getJumlah'); ?>",
            dataType: "json",
            success: function(response) {
                $('.viewjumlah').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        datauser();
        jumlahuser();

        $('.tomboltambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= base_url('User/form_tambah'); ?>",
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