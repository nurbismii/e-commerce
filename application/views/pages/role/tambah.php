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
                            <?php echo form_open('role/add') ?>
                            <div class="card-body">
                                <div class="form-group col-sm-8">
                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label for="deskripsi">Role</label>
                                            <input type="text" <?php echo form_error('role') ?: '' ?> class="form-control" id="role" name="role" placeholder="New role">
                                        </div>
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