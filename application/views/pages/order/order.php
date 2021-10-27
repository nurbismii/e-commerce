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
                <?php echo $this->session->flashdata('msg'); ?>
                <!-- DataTales Example -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark">Alamat Penerima</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Penerima</th>
                                                <th class="text-center"><i class="fas fa-fw fa-cog"></i></th>
                                            </tr>
                                        </thead>
                                        <?php $count = 0;
                                        foreach ($data as $row) {
                                            $count++;
                                        ?>
                                            <tbody>
                                                <tr style="text-align:justify;">
                                                    <td><img class="rounded" width="80" src="<?php echo base_url('upload/product/') . $row->foto ?>"></td>
                                                    <td>
                                                        <?php echo $row->nama_penerima ?>(<?php echo $row->alamat ?>)<br>
                                                        <?php echo $row->telepon ?><br>
                                                        <?php echo $row->kota ?>,<?php echo $row->provinsi ?>,
                                                        <?php echo $row->kodepos ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <button class="btn btn-outline-success btn-icon-split btn-sm" data-toggle="modal" data-target="#konfirm<?php echo $row->id ?>">
                                                            <span class="icon text-white-300">
                                                                <i class="fas fa-reply"></i>
                                                            </span>
                                                            <span class="text">Status</span>
                                                        </button>
                                                        <a href="" class="btn btn-outline-info btn-icon-split btn-sm">
                                                            <span class="icon text-white-300">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                            <span class="text">Detail</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Penilai -->
<?php $count = 0;
foreach ($data as $row) { ?>
    <div class="modal fade" id="konfirm<?php echo $row->id ?>" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengiriman</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?php echo form_open_multipart('order/update') ?>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-8">
                                <input type="hidden" name="id" value="<?php echo $row->id ?>" readonly>
                                <p><?php echo $row->nama_penerima ?>(<?php echo $row->alamat ?>)
                                    <?php echo $row->telepon ?><br>
                                    <?php echo $row->kota ?>,<?php echo $row->provinsi ?>,
                                    <?php echo $row->kodepos ?>
                                    <img class="rounded" width="100" width="200" src="<?php echo base_url('upload/product/') . $row->foto ?>">
                                </p>
                            </div>
                            <div class="form-group col-4">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label for="Status">Status Pembayaran</label>
                                        <input type="text" name="status_pembayarn" class="form-control" value="<?php echo ucfirst($row->status_pembayaran) ?>" disabled="on">
                                    </div>
                                    <?php if ($this->session->userdata('id_role') == 1) {
                                    ?>
                                        <div class="form-group">
                                            <label for="Status_pengiriman">Status Pengiriman</label>
                                            <select class="form-control" name="status_pengiriman" id="status_pengiriman">
                                                <option value="">- Status -</option>
                                                <option value="Proses">Proses</option>
                                                <option value="Dikirim">Dikirim</option>
                                                <option value="Menunggu">Menunggu</option>
                                            </select>
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <label for="Status">Status Pengiriman</label>
                                            <input type="text" class="form-control" name="status_pengiriman" value="<?php echo ucfirst($row->status_pengiriman) ?>" disabled="on">
                                        <?php } ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>