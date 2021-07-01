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
                <h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>
                <?php echo form_open_multipart('product/add') ?>
                <div class="form-group col-sm-8">
                    <div class="col-lg">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="Id_product">ID Produk</label>
                                <input <?php echo form_error('id_product') ?: '' ?> type="text" class="form-control" id="id_product" name="id_produk" placeholder="ID Produk example P001">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="Nama">Nama Produk</label>
                                <input <?php echo form_error('name') ?: '' ?> type="text" class="form-control" id="nama" name="nama" placeholder="Nama Produk"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi produk">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="jumlah">Jumlah Produk</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Produk">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="Harga">Harga</label>
                                <input <?php echo form_error('harga') ?: '' ?> type="text" class="form-control" id="harga" name="harga" placeholder="Harga Produk">
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
                            <label for="foto">Gambar</label>
                            <input type="file" class="form-control" id="userfile" name="userfile">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-light">Hapus</button>
                        <a href="<?= base_url('product') ?>" class="btn btn-light float-right">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>