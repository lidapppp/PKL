<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Jabatan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="viewjumlah"></span> Jabatan 3
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-id-card-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><span class="viewjumlah"></span> Pegawai 1</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-id-card-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Gaji Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.4.4 <span class="viewgaji"></span></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>