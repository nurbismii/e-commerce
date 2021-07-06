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
                <h1 class="h3 mb-4 text-gray-800">Riwayat Transaksi
                    <a class="btn btn-info btn-icon-split btn-sm float-right" href="<?= base_url('dashboard/home') ?>">
                        <span class="icon text-white-50">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="text">Home</span>
                    </a>
                </h1>
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableCategory" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align:center">
                                        <th>Nama</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Pesan</th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($data as $row) {
                                    $count++;
                                ?>
                                    <?php if ($this->session->userdata('nama') == $row->nama) { ?>
                                        <tbody>
                                            <tr style="text-align:center">
                                                <td><?php echo $row->nama ?></td>
                                                <td><?php echo $row->produk ?></td>
                                                <td><?php echo $row->harga ?></td>
                                                <td><?php echo $row->status ?></td>
                                                <td><?php echo $row->pesan ?></td>

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

<!-- Modal Penilai 
<div class="modal fade" id="delete<?php echo $row->id ?>" role="dialog">
    <div class="modal-dialog modal-md">
        Modal content
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin mau menghapus riwayat transaksi?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
                <button type="button" onclick="location.href='<?php echo base_url('order/delete/') . $row->id ?>'" class="btn btn-info">Hapus</button>
            </div>

            </form>
        </div>

    </div>
</div>
End Modal-->