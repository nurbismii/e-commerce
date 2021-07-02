<!-- Page Wrapper -->
<div id="wrapper">
    <?php $this->load->view('_partials/sidebar') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?php $this->load->view('_partials/topbar') ?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                <div class="row">

                    <?php $count = 0;
                    foreach ($data as $row) {
                        $count++;
                        $rupiah = number_format($row->harga);
                        $rupiah = str_replace(',', '.', $rupiah);
                    ?>
                        <div class="col-lg-3">
                            <div class="card" style="width: 14rem;">
                                <img class="card-img-top" src="<?php echo base_url('upload/product/') . $row->foto ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo substr($row->nama, 0, 15)  ?></h5>
                                    <p class="card-text"><?php echo substr($row->deskripsi, 0, 15)  ?> ....</p>
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
                </div>
            </div>
        </div>
        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>

<a href="#" class="btn btn-light btn-icon-split">
    <span class="icon text-gray-600">
        <i class="fas fa-arrow-right"></i>
    </span>
    <span class="text">Split Button Light</span>
</a>