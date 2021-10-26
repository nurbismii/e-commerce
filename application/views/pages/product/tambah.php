<!-- Page Wrapper -->
</style>
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
                                <h6 class="m-0 font-weight-bold text-dark">Produk Baru
                                    <a href="<?= base_url('product') ?>" class="btn btn-light btn-sm float-right">Tutup</a>
                                </h6>
                            </div>
                            <!-- Card Body -->
                            <form class="user" action="<?= base_url('product/add') ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <!-- Nested Row within Card Body -->
                                    <div class="form-group col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">

                                                <input <?php echo form_error('id_product') ?: '' ?> type="text" class="form-control form-control-user" id="id_product" name="id_produk" placeholder="ID Produk example P001">
                                            </div>
                                            <div class="form-group col-md-8">

                                                <input <?php echo form_error('name') ?: '' ?> type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Produk"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Deskripsi produk">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">

                                                <input type="number" class="form-control form-control-user" id="jumlah" name="jumlah" placeholder="Jumlah Produk">
                                            </div>
                                            <div class="form-group col-md-8">

                                                <input <?php echo form_error('harga') ?: '' ?> type="number" class="form-control form-control-user" id="harga" name="harga" placeholder="Harga Produk">
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
                                            <label for="foto">Gambar</label>
                                            <input type="file" class="form-control form-control-user" id="userfile" name="userfile" placeholder="Foto Produk">
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer text-right py-3">

                                    <button type="reset" class="btn btn-light btn-sm">Hapus</button>
                                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>

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