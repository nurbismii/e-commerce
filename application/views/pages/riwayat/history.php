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
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info">Riwayat
                            <a class="btn btn-light btn-icon-split btn-sm float-right" href="<?= base_url('home') ?>">
                                <span class="icon text-white-300">
                                    <i class="fas fa-home"></i>
                                </span>
                                <span class="text">Home</span>
                            </a>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-borderless" id="tableCategory" width="100%" cellspacing="0">
                                <thead>
                                    <tr style="text-align: center">
                                        <th><i class="fas fa-fw fa-cog"></i></th>

                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Status</>

                                        <th><i class="fas fa-fw fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <?php $count = 0;
                                foreach ($data as $row) {
                                    $count++;
                                ?>
                                    <?php if ($this->session->userdata('nama') == $row->nama) { ?>
                                        <tbody>
                                            <tr style="text-align:justify">
                                                <?php if ($row->status == "Proses") { ?>
                                                    <td>
                                                        <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#konfirm<?php echo $row->id ?>">
                                                            <span class="icon text-white-300">
                                                                <i class="fas fa-reply"></i>
                                                            </span>
                                                            <span class="text"></span>
                                                        </button>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>XXX</td>
                                                <?php } ?>

                                                <td><?php echo $row->nama ?></td>
                                                <td><?php echo $row->alamat ?></td>
                                                <td><?php echo $row->telp ?></td>
                                                <td><?php echo $row->nama_produk ?></td>
                                                <td><?php echo $row->qty ?></td>
                                                <td><?php echo $row->harga ?></td>
                                                <td><?php echo $row->status ?></td>

                                                <?php if ($row->status == "Selesai") { ?>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row->id ?>">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-trash"></i>
                                                            </span>
                                                            <span class="text"></span>
                                                        </button>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>XXX</td>
                                                <?php  } ?>
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

<!-- Modal  -->
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
<!-- End Modal -->
<?php $count = 0;
foreach ($data as $row) {
    $count++;
?>
    <!-- Modal Penilai -->
    <div class="modal fade" id="konfirm<?php echo $row->id ?>" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengiriman</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('order/update') ?>
                    <div class="form-group col-sm-12">
                        <div class="col-lg">
                            <div class="form-group">
                                <input type="hidden" name="transaksi_id" value="<?php echo $row->id ?>" readonly>
                                <input type="hidden" name="status" value="Selesai">
                                <div style="text-align:center;">
                                    <h6><b> Produk sudah diterima ? </b></h6>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-sm btn-info">Ya</button>
                        </div>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>