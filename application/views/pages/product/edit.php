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
                <h1 class="h3 mb-4 text-gray-800">Edit Produk</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-sm-8">
                        <div class="col-lg">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="Id_product">ID Produk</label>
                                    <input type="text" class="form-control" id="id_product" name="id_produk" <?php echo form_error('id_produk') ? 'is-invalid' : '' ?> value="<?php echo $data->id_produk ?>" readonly>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="Nama">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama" name="nama" <?php echo form_error('nama') ? 'is-invalid' : '' ?> value="<?php echo $data->nama ?>"></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" <?php echo form_error('deskripsi') ? 'is-invalid' : '' ?> value="<?php echo $data->deskripsi ?>">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Produk</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" <?php echo form_error('jumlah') ? 'is-invalid' : '' ?> value="<?php echo $data->jumlah ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('jumlah') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" <?php echo form_error('harga') ? 'is-invalid' : '' ?> value="<?php echo $data->harga ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('harga') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option value="">- Kategori -</option>
                                    <option value="1">Baju</option>
                                    <option value="2">Celana</option>
                                    <option value="3">Sepatu</option>
                                    <option value="4">Sweater</option>
                                    <option value="5">Kacamata</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" id="userfile" name="userfile" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="foto_lama" value="<?php echo $data->foto ?>">
                            </div>
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            <button type="reset" class="btn btn-light" data-dismiss="modal">Tutup</button>
                            <a href="<?= base_url('product') ?>" class="btn btn-light float-right">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>