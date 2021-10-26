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
                <h1 class="h3 mb-4 text-gray-800">Pembayaran<a class="btn btn-light btn-icon-split btn-sm float-right" href="<?= base_url('home') ?>">
                        <span class="icon text-white-50">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="text">Home</span>
                    </a></h1>
                <?php echo $this->session->flashdata('msg') ?>
                <div class="card mb-4 py-3 border-left-info">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="#" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center">

                                        <th>Bank</th>
                                        <th>No Rekening</th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($data as $row) {
                                    $count++;
                                ?>
                                    <tbody>
                                        <tr style="text-align:center">
                                            <td><?php echo $row->nama_bank ?></td>
                                            <td><?php echo $row->no_rek ?></td>
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