<!-- Page Wrapper -->
<div id="wrapper">
    <?php
    if ($this->session->userdata('id_role') == 1)
        $this->load->view('_partials/sidebar');
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-lg-3">
                        <!-- Project Card Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Kategori</h6>
                            </div>
                            <?php $kategori = $this->m_category->getData(); ?>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <div class="card-body">
                                    <a href="<?= base_url('home/kategori/') . $value->id_kategori ?>">
                                        <h6 class="text-left m-0 font-weight-bold text-dark"><?php echo $value->kategori ?></h6>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <?php echo $this->session->flashdata('msg') ?>
                            <div class="card-body">
                                <div class="row">
                                    <?php $count = 0;
                                    foreach ($produk as $row) {
                                        $count++;
                                        $rupiah = number_format($row->harga);
                                        $rupiah = str_replace(',', '.', $rupiah);
                                    ?>
                                        <?php if ($row->jumlah != "0") { ?>

                                            <div class="col-sm-4">
                                                <div class="card mb-4">
                                                    <?php echo form_open_multipart('home/tambah') ?>
                                                    <img class="card-img-top" height="220" src="<?php echo base_url('upload/product/') . $row->foto ?>" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo substr($row->nama, 0, 17) ?></h5>
                                                        <p class="card-text small"><?php echo substr($row->deskripsi, 0, 22) ?>..<br>
                                                            <span class="card-text small">Stok <?php echo $row->jumlah ?></span>
                                                        </p>
                                                        <p class="card-text">Rp <?php echo $rupiah ?></p>
                                                        <input type="hidden" name="id" value="<?php echo $row->id_produk ?>" />
                                                        <input type="hidden" name="nama" value="<?php echo $row->nama ?>" />
                                                        <input type="hidden" name="harga" value="<?php echo $row->harga ?>" />
                                                        <input type="hidden" name="foto" value="<?php echo $row->foto ?>" />
                                                        <input type="hidden" name="jumlah" value="1" />
                                                        <button type="submit" class="btn btn-outline-success btn-sm btn-icon-split">
                                                            <span class="icon text-gray-100">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </span>
                                                            <span class="text">Keranjang</span>
                                                        </button>
                                                        <a href="<?php echo base_url('product/detail/') . $row->id_produk; ?>" class="btn btn-light btn-sm btn-icon-split">
                                                            <span class="icon text-gray-100">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                            <span class="text">Detail</span>
                                                        </a>
                                                    </div>
                                                    <?php echo form_close() ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>