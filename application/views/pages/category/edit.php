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
                <h1 class="h3 mb-4 text-gray-800">Edit Kategori

                </h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-sm-8">
                        <div class="col-lg">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Id_kategori">ID Produk</label>
                                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" <?php echo form_error('id_kategori') ? 'is-invalid' : '' ?> value="<?php echo $data->id_kategori ?>" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="kategori" <?php echo form_error('kategori') ? 'is-invalid' : '' ?> value="<?php echo $data->kategori ?>"></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kategori') ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <button type="reset" class="btn btn-light" data-dismiss="modal">Hapus</button>
                            <a href="<?= base_url('category') ?>" class="btn btn-light float-right">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>