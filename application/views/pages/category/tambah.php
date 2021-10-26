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
                    <div class="col-lg-7 mb-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Kategori Baru
                                    <a href="<?= base_url('category') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <form class="user" action="<?= base_url('category/add') ?>" method="POST">
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <div class="form-group">
                                            <input type="text" <?php echo form_error('kategori') ?: '' ?> class="form-control form-control-user" id="kategori" name="kategori" placeholder="Kategori baru">
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