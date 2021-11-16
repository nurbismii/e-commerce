<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Toko Baru
                                    <a href="<?= base_url('setting') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <form class="" action="<?= base_url('setting/store') ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Toko">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <select class="form-control" id="provinsi" name="provinsi"></select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <select class="form-control" id="kota" name="kota"></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="telepon" placeholder="Telepon">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer py-3 text-right">
                                    <button type="reset" class="btn btn-light">Hapus</button>
                                    <button type="submit" class="btn btn-success mr-2">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>

