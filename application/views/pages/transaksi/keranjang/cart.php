<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800">Keranjang Belanja</h1>
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Isi Keranjang</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>Produk</th>
                                        <th></th>
                                        <th></th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>

                                        <th><i class="fas fa-fw fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($cart_ as $row) {
                                    $count++;
                                ?>
                                    <?php if ($this->session->userdata('nama') == $row->nama) { ?>
                                        <tbody>
                                            <tr style="text-align:center">
                                                <td><img width="100" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
                                                <td><button class="btn btn-danger btn-icon-split btn-sm badge" data-toggle="modal" data-target="#delete<?php echo $row->id_cart ?>">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Hapus</span>
                                                    </button></td>
                                                <td><?php echo $row->nama_produk ?></td>
                                                <td><?php echo $row->harga ?></td>
                                                <td><?php echo $row->jumlah ?></td>


                                                <td>
                                                    <button data-toggle="modal" data-target="#edit<?php echo $row->id_cart ?>" class="btn btn-success btn-icon-split btn-sm badge">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </span>
                                                        <span class="text">Edit</span>
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
foreach ($cart_ as $row) {
    $count++;
?>
    <div class="modal fade" id="edit<?php echo $row->id_cart ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan item ke keranjang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" action="<?php echo base_url('transaksi/update'); ?>" method="POST">
                        <div class="form-group col-sm-12">
                            <div class="col-lg">
                                <div class="form-group ">
                                    <input <?php echo form_error('id_cart') ?: '' ?> type="hidden" class="form-control" id="id_cart" name="id_cart" value="<?php echo $row->id_cart ?>">
                                </div>
                                <div class="form-group ">
                                    <input <?php echo form_error('id_produk') ?: '' ?> type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?php echo $row->id_produk ?>">
                                </div>
                                <div class="form-group ">
                                    <label for="Id_product">Produk</label>
                                    <input <?php echo form_error('nama_produk') ?: '' ?> type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama_produk ?>" disabled>
                                </div>

                                <div class="form-group ">
                                    <img width="100" src="<?php echo base_url('upload/product/') . $row->foto ?>">
                                </div>
                                <div class="form-group ">
                                    <label for="jumlah">Jumlah Pesan</label>
                                    <input <?php echo form_error('jumlah') ?: '' ?> type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row->jumlah ?>">
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

<!-- delete modal -->
<?php $count = 0;
foreach ($cart_ as $row) {
    $count++;
?>
    <div class="modal fade" id="delete<?php echo $row->id_cart ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delteModalLabel">Hapus Produk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apa kamu yakin ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                    <button type="button" onclick="location.href='<?php echo base_url('transaksi/delete/') . $row->id_cart ?>'" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>