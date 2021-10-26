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
                                                        <button class="btn btn-light btn-icon-split btn-sm" data-toggle="modal" data-target="#konfirm<?php echo $row->id ?>">
                                                            <span class="icon text-white-300">
                                                                <i class="fas fa-reply"></i>
                                                            </span>
                                                            <span class="text">Terima</span>
                                                        </button>
                                                        <a href="" class="btn btn-info btn-icon-split btn-sm">
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
<div class="modal fade" id="konfirm<?php echo $row->id ?>" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengiriman</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('order/update') ?>
                <div class="form-group col-sm-8">
                    <div class="col-lg">
                        <div class="form-group">

                            <input type="hidden" name="transaksi_id" value="<?php echo $row->id ?>" readonly>

                            <div class="form-group">
                                <label for="Status">Status Pengiriman</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="">- Status -</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Menunggu">Menunggu</option>
                                </select>
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