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
                        <h6 class="m-0 font-weight-bold text-dark">Produk
                            <a href="<?php echo site_url('product/add') ?>" class="btn btn-success float-right btn-sm">
                                <span class="text">Baru</span>
                            </a>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="tableProduct" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Berat</th>
                                        <th width="10%" class="text-center"><i class="fas fa-fw fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($data as $row) {
                                    $count++;
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $count ?></td>
                                            <td><img class="rounded" width="50" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
                                            <td><?php echo $row->nama ?></td>
                                            <td><?php echo $row->deskripsi ?></td>
                                            <td class="text-center"><?php echo $row->jumlah ?></td>
                                            <td><?php echo $row->harga ?></td>
                                            <td><?php echo $row->berat ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('product/edit/' . $row->id_produk) ?>" class="btn btn-warning btn-sm">
                                                    <span class="icon text-white-300">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row->id_produk ?>">
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

<!-- Hapus produk modal -->
<?php $count = 0;
foreach ($data as $row) {
    $count++;
?>
    <div class="modal fade" id="delete<?php echo $row->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delteModalLabel">Hapus produk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apa kamu yakin ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="button" onclick="location.href='<?php echo base_url('product/delete/') . $row->id_produk ?>'" class="btn btn-info">Hapus</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>