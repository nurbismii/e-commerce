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
                                <h6 class="m-0 font-weight-bold text-info">Edit Produk
                                    <a href="<?= base_url('product') ?>" class="btn btn-light float-right">Tutup</a>
                                </h6>
                            </div>
                            <form class="user" action="" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group col-lg">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">

                                                <input type="text" class="form-control form-control-user" id="id_product" name="id_produk" <?php echo form_error('id_produk') ? 'is-invalid' : '' ?> value="<?php echo $data->id_produk ?>" readonly>
                                            </div>
                                            <div class="form-group col-md-8">

                                                <input type="text" class="form-control form-control-user" id="nama" name="nama" <?php echo form_error('nama') ? 'is-invalid' : '' ?> value="<?php echo $data->nama ?>"></input>
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" <?php echo form_error('deskripsi') ? 'is-invalid' : '' ?> value="<?php echo $data->deskripsi ?>">
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user" id="jumlah" name="jumlah" <?php echo form_error('jumlah') ? 'is-invalid' : '' ?> value="<?php echo $data->jumlah ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('jumlah') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user" id="harga" name="harga" <?php echo form_error('harga') ? 'is-invalid' : '' ?> value="<?php echo $data->harga ?>">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('harga') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <select class="form-control form-control-user" name="kategori" id="kategori">
                                                <option value="">- Kategori -</option>
                                                <?php foreach ($kategori as $value) { ?>
                                                    <option value="<?php echo $value->id_kategori ?>"><?php echo $value->kategori ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="file" id="userfile" name="userfile" class="form-control form-control-user">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="foto_lama" value="<?php echo $data->foto ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer py-3 text-right">
                                    <button type="submit" class="btn btn-success btn-sm mr-2">Simpan</button>
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