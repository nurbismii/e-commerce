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
                <h1 class="h3 mb-4 text-gray-800">Edit Role

                </h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-sm-8">
                        <div class="col-lg">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Id_kategori">ID Role</label>
                                    <input type="text" class="form-control" id="id_role" name="id_role" <?php echo form_error('id_role') ? 'is-invalid' : '' ?> value="<?php echo $data->id_role?>">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="kategori">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" <?php echo form_error('role') ? 'is-invalid' : '' ?> value="<?php echo $data->role ?>"></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('role') ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <button type="reset" class="btn btn-light" data-dismiss="modal">Hapus</button>
                            <a href="<?= base_url('role') ?>" class="btn btn-light float-right">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>