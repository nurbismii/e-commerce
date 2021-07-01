<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800"> Produk </h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kacamata</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableProduct" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align: center;">
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
                                    <?php if ($row->kategori == "Kacamata") { ?>
                                        <tbody>
                                            <tr style="text-align:center; text-align:justify;">
                                                <td><img width="50" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
                                                <td><?php echo $row->nama ?></td>
                                                <td><?php echo $row->deskripsi ?></td>
                                                <td><?php echo $row->jumlah ?></td>
                                                <td><?php echo $row->harga ?></td>
                                                <td><?php echo $row->kategori ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-icon-split btn-sm badge">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                        <span class="text">Beli</span>
                                                    </a>
                                                    <button data-toggle="modal" data-target="#addCart<?php echo $row->id_produk ?>" class="btn btn-success btn-icon-split btn-sm badge">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                        <span class="text">Cart</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
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
<!-- cart modal -->
<?php $count = 0;
foreach ($data as $row) {
    $count++;
?>
    <div class="modal fade" id="addCart<?php echo $row->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan item ke keranjang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="<?php echo base_url('transaksi/add'); ?>" method="POST">
                        <div class="form-group col-sm-12">
                            <div class="col-lg">
                                <div class="form-group ">
                                    <input <?php echo form_error('id_product') ?: '' ?> type="hidden" class="form-control" id="id_product" name="id_produk" value="<?php echo $row->id_produk ?>">
                                </div>
                                <div class="form-group ">
                                    <label for="Id_product">Produk</label>
                                    <input <?php echo form_error('nama') ?: '' ?> type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama ?>" disabled>
                                </div>

                                <div class="form-group ">
                                    <img width="100" src="<?php echo base_url('upload/product/') . $row->foto ?>">
                                </div>
                                <div class="form-group ">
                                    <label for="jumlah">Jumlah</label>
                                    <input <?php echo form_error('jumlah') ?: '' ?> type="text" class="form-control" id="jumlah" name="jumlah">
                                </div>
                                <div class="form-group ">
                                    <input <?php echo form_error('id_user') ?: '' ?> type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>"></input>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Simpan</button>
                                <a href="<?= base_url('product/shirt') ?>" class="btn btn-light">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
<?php } ?>