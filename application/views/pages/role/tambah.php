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
                <h1 class="h3 mb-4 text-gray-800">Tambah Role</h1>
                <?php echo form_open('role/add') ?>
                <div class="form-group col-sm-8">
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="deskripsi">Role</label>
                            <input type="text" <?php echo form_error('role') ?: '' ?> class="form-control" id="role" name="role" placeholder="New role">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        <a href="<?= base_url('role') ?>" class="btn btn-light">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>