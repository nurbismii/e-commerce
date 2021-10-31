<!-- Page Wrapper -->
<div id="wrapper">
    <?php if ($this->session->userdata('id_role') == 1)
        $this->load->view('_partials/sidebar');
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <div class="row">
                    <?php echo $this->session->flashdata('msg') ?>
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <img class="card-img-top" width="100%" height="400" src="<?php echo base_url('upload/product/') . $data->foto ?>" alt="Card image">
                            <div class="card-body">
                                <h5 class="card-title">Deskripsi</h5>
                                <span class="card-text small">Kategori :
                                    <i class="m-0 font-weight-bold text-success"><?php echo $data->kategori ?></i>
                                </span><br>
                                <span class="card-text small">
                                    Stok : <?php echo $data->jumlah ?>
                                </span>
                                <p class="card-text"><?php echo $data->deskripsi ?><br></p>
                                <p class="card-text">Rp <?php echo number_format($data->harga) ?></p>
                                <a href="<?= base_url('home') ?>" class="btn btn-light btn-block btn-sm">
                                    <span class="text">Tutup</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow mb-4">
                            <!-- Card Body -->
                            <?php echo form_open_multipart('shopping/tambah') ?>
                            <div class="card-body">
                                <img class="card-img-top" height="220" src="<?php echo base_url('upload/product/') . $data->foto ?>" alt="Card image cap">
                                <input type="hidden" name="id" value="<?php echo $data->id_produk ?>" />
                                <input type="hidden" name="nama" value="<?php echo $data->nama ?>" />
                                <input type="hidden" name="harga" value="<?php echo $data->harga ?>" />
                                <input type="hidden" name="berat" value="<?php echo $data->berat ?>" />
                                <input type="hidden" name="foto" value="<?php echo $data->foto ?>" />
                                <input type="hidden" name="jumlah" value="1" />
                            </div>
                            <div class="card-footer py-2 d-flex flex-row align-items-center justify-content-between">
                                <button type="submit" class="btn btn-outline-success btn-sm btn-block">
                                    <span class="text">Keranjang</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>