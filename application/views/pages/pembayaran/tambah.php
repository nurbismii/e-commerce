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
                <h1 class="h3 mb-4 text-gray-800">Tambah Metode</h1>
                <?php echo form_open('metode_pembayaran/add') ?>
                <div class="form-group col-sm-8">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="metode_pembayaran">Bank</label>
                            <input type="text" <?php echo form_error('nama_bank') ?: '' ?> class="form-control" id="bank" name="nama_bank" placeholder="Bank">
                        </div>
                        <div class="form-group">
                            <label for="metode_pembayaran">No Rekening</label>
                            <input type="text" <?php echo form_error('no_rek') ?: '' ?> class="form-control" id="no_rek" name="no_rek" placeholder="No Rekening">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        <button type="reset" class="btn btn-light">Hapus</button>
                        <a href="<?= base_url('metode_pembayaran') ?>" class="btn btn-light float-right">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>