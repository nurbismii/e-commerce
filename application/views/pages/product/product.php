<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Produk
                    <a href="<?php echo site_url('product/add') ?>" class="btn btn-primary btn-icon-split float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Produk</span>
                    </a>
                </h1>
                <?php echo $this->session->flashdata('msg'); ?>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableProduct" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Produk</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th><i class="fas fa-fw fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($data as $row) {
                                    $count++;
                                ?>
                                    <tbody>
                                        <tr style="text-align:center">
                                            <td><?php echo $row->id_produk ?></td>
                                            <td><img width="50" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
                                            <td><?php echo $row->nama ?></td>
                                            <td><?php echo $row->deskripsi ?></td>
                                            <td><?php echo $row->jumlah ?></td>
                                            <td><?php echo $row->harga ?></td>
                                            <td><?php echo $row->kategori ?></td>
                                            <td>
                                                <a href="<?php echo base_url('product/edit/' . $row->id_produk) ?>" class="btn btn-warning btn-icon-split btn-sm badge">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Update</span>
                                                </a>
                                                <button class="btn btn-danger btn-icon-split btn-sm badge" data-toggle="modal" data-target="#delete<?php echo $row->id_produk ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Delete</span>
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
foreach ($data_ as $row) {
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
                    <button class="btn btn-secondary" type="button">Batal</button>
                    <button type="button" onclick="location.href='<?php echo base_url('product/delete/') . $row->id_produk ?>'" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>