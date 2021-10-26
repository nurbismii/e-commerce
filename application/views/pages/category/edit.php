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
                                <h6 class="m-0 font-weight-bold text-dark">Ubah Kategori
                                    <a href="<?= base_url('category') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <form class="user" action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control form-control-user" id="id_kategori" name="id_kategori" <?php echo form_error('id_kategori') ? 'is-invalid' : '' ?> value="<?php echo $data->id_kategori ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-8">

                                                <input type="text" class="form-control form-control-user" id="kategori" name="kategori" <?php echo form_error('kategori') ? 'is-invalid' : '' ?> value="<?php echo $data->kategori ?>"></input>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('kategori') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header py-3 text-right">
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