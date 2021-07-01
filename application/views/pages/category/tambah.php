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
                <?php echo form_open('category/add') ?>
                <div class="form-group col-sm-8">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="deskripsi">Kategori</label>
                            <input type="text" <?php echo form_error('deskripsi') ?: '' ?> class="form-control" id="kategori" name="kategori" placeholder="Kategori baru">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-light">Hapus</button>
                        <a href="<?= base_url('category') ?>" class="btn btn-light float-right">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>