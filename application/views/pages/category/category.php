<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <?php echo $this->session->flashdata('msg'); ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-dark">Data Kategori
                            <a href="<?php echo site_url('category/add') ?>" class="btn btn-light btn-icon-split float-right btn-sm">
                                <span class="icon text-white-300">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Baru</span>
                            </a>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless text-center" id="tableCategory" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Kategori</th>
                                        <th>Kategori</th>
                                        <th><i class="fas fa-fw fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($data as $row) {
                                    $count++;
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row->id_kategori ?></td>
                                            <td><?php echo $row->kategori ?></td>
                                            <td>
                                                <a href="<?php echo base_url('category/edit/' . $row->id_kategori) ?>" class="btn btn-warning btn-sm">
                                                    <span class="icon text-white-300">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row->id_kategori ?>">
                                                    <span class="icon text-white-300">
                                                        <i class="fas fa-trash"></i>
                                                    </span>

                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>

<?php $count = 0;
foreach ($data as $row) {
    $count++;
?>
    <div class="modal fade" id="delete<?php echo $row->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delteModalLabel">Hapus Kategori</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apa kamu yakin ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                    <button type="button" onclick="location.href='<?php echo base_url('category/delete/') . $row->id_kategori ?>'" class="btn btn-info">Hapus</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>