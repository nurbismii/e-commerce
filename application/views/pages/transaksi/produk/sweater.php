<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Semua Kategori</h1>
                <?php echo $this->session->flashdata('msg') ?>
                <div class="row">
                    <?php $count = 0;
                    foreach ($data as $row) {
                        $count++;
                        $rupiah = number_format($row->harga);
                        $rupiah = str_replace(',', '.', $rupiah);
                    ?>
                        <?php if ($row->kategori == "Sweater") { ?>
                            <div class="col-lg-3">
                                <?php echo form_open_multipart('shopping/tambah') ?>
                                <div class="card" style="width: 14rem;">
                                    <img class="card-img-top" src="<?php echo base_url('upload/product/') . $row->foto ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo substr($row->nama, 0, 15)  ?></h5>
                                        <p class="card-text"><?php echo substr($row->deskripsi, 0, 15)  ?> ....</p>
                                        <p class="card-text">Rp. <?php echo  $rupiah ?></p>

                                        <input type="hidden" name="id" value="<?php echo $row->id_produk ?>" />
                                        <input type="hidden" name="nama" value="<?php echo $row->nama ?>" />
                                        <input type="hidden" name="harga" value="<?php echo $row->harga ?>" />
                                        <input type="hidden" name="foto" value="<?php echo $row->foto ?>" />
                                        <input type="hidden" name="jumlah" value="1" />
                                        <button type="submit" class="btn btn-light btn-sm btn-icon-split">
                                            <span class="icon text-gray-600">
                                                <i class="fas fa-shopping-cart"></i>
                                            </span>
                                            <span class="text">+</span>
                                        </button>
                                        <a href="#" class="btn btn-info btn-sm btn-icon-split">
                                            <span class="icon text-gray-300">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <span class="text">Detail</span>
                                        </a>
                                    </div>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>