<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Baru
                                    <a href="<?= base_url('role') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <form class="user" action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="Id_kategori">ID Role</label>
                                                <input type="text" class="form-control form-control-user" id="id_role" name="id_role" <?php echo form_error('id_role') ? 'is-invalid' : '' ?> value="<?php echo $data->id_role ?>">
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="kategori">Role</label>
                                                <input type="text" class="form-control form-control-user" id="role" name="role" <?php echo form_error('role') ? 'is-invalid' : '' ?> value="<?php echo $data->role ?>"></input>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('role') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer py-3 text-right">
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