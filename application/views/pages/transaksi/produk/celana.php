<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">

                <h1 class="h3 mb-4 text-gray-800"> Celana </h1>

                <!-- DataTales Example -->
                <div class="row">

                    <?php $count = 0;
                    foreach ($data as $row) {
                        $count++;
                        $rupiah = number_format($row->harga);
                        $rupiah = str_replace(',', '.', $rupiah);
                    ?>
                        <?php if ($row->kategori == "Celana") { ?>
                            <div class="col-lg-3">
                                <div class="card" style="width: 14rem;">
                                    <img class="card-img-top" src="<?php echo base_url('upload/product/') . $row->foto ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo substr($row->nama, 0, 15)  ?></h5>
                                        <p class="card-text"><?php echo substr($row->deskripsi, 0, 20)  ?> ....</p>
                                        <p class="card-text">Rp. <?php echo  $rupiah ?></p>
                                        <a href="#" class="btn btn-primary btn-sm">Beli </a>
                                        <button data-toggle="modal" data-target="#addCart<?php echo $row->id_produk ?>" class="btn btn-light btn-sm btn-icon-split">
                                            <span class="icon text-gray-600">
                                                <i class="fas fa-shopping-cart"></i>
                                            </span>
                                            <span class="text">+</span>
                                        </button>
                                        <a href="#" class="btn btn-info btn-sm float-right btn-icon-split">
                                        <span class="icon text-gray-300">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
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