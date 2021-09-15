<section class="content-header">
  <h1>
    Pengawasan
    <b>hiburan</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pengawasan</li>
    <li class="active">hiburan</li>
    <li class="active">Edit</li>
  </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ubah Data Pengawasan</h3>
            <div class="pull-right">
                <a href="<?= site_url('pws_hiburan')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php $this->view('pesan')?>
                <?php // echo validation_errors(); ?>
                <?php echo form_open_multipart(current_url()) ?>
                    <div>
                        <label>Nomor Pengawasan</label>
                        <input type="text" name="no_pws" value="<?=$row->no_pws?>" class="form-control" readonly>
                    </div>
                    <div class="form-group <?=form_error('tgl_pws')? 'has-error' : null?>">
                        <label for="tgl_pws">Tanggal Pengawasan</label>
                        <input type="date" id="tgl_pws" name="tgl_pws" value="<?=$this->input->post('tgl_pws') ? $this->input->post('tgl_pws') : $row->tgl_pws?>" class="form-control">
                        <?=form_error('tgl_pws')?> 
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipe_id" value="<?=$cariwp->tipe_id?>">
                    </div>
                    <div class="form-group">
                        <label for="npwpd">NPWPD</label>
                        <div class="form-group input-group">
                            <input type="text" name="npwpd" id="npwpd" class="form-control" value="<?=$this->input->post('npwpd') ? $this->input->post('npwpd') : $row->npwpd?>" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('nama_wp')? 'has-error' : null?>">
                        <label for="nama_wp">Nama Wajib Pajak</label>
                        <input type="text" name="nama_wp" id="nama_wp" value="<?=$cariwp->nama_wp?>" class="form-control" readonly>
                        <?=form_error('nama_wp')?>
                    </div>
                    <div class="form-group <?=form_error('tipe_wp')? 'has-error' : null?>">
                        <label for="tipe_wp">Tipe Wajib Pajak</label>
                        <input type="text" name="tipe_wp" value="<?=$cariwp->jenis_tipe?>" id="tipe_wp" class="form-control" readonly>
                        <?=form_error('tipe_wp')?>
                    </div>
                    <div class="form-group">
                        <label>SSPD</label>
                        <input type="file" name="sspd" class="form-control">
                        <small>.Pdf (maksimal 2MB)</small>
                    </div>
                    <div class="form-group">
                        <label>SPTPD</label>
                        <input type="file" name="sptpd" class="form-control">
                        <small>.Pdf (maksimal 2MB)</small>
                    </div>
                    <div class="form-group <?=form_error('tgl_bayar')? 'has-error' : null?>">
                        <label for="tgl_bayar">Tanggal Bayar Terakhir</label>
                        <input type="date" id="tgl_bayar" name="tgl_bayar" value="<?=$this->input->post('tgl_bayar') ? $this->input->post('tgl_bayar') : $row->tgl_bayar?>" class="form-control">
                        <?=form_error('tgl_bayar')?> 
                    </div>
                    <br><br>
                    <div>
                        <h3 align="center">DATA HASIL PENGAWASAN</h3>
                    </div>
                    <div class="form-group <?=form_error('izin')? 'has-error' : null?>">
                        <label for="izin">Izin</label>
                        <select name="izin" class="form-control" id="izin">
                            <?php $izin=$this->input->post('izin') ? $this->input->post('izin') : $row->izin?>
                            <option value="ada"  <?=$izin == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak" <?=$izin == "tidak" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('izin')?>
                    </div>
                    <div class="form-group <?=form_error('tarif')? 'has-error' : null?>">
                        <label for="tarif">Tarif Pajak</label>
                        <select name="tarif" class="form-control" id="tarif">
                            <?php $tarif=$this->input->post('tarif') ? $this->input->post('tarif') : $row->tarif?>
                            <option value="benar" <?=$tarif == "benar" ? "selected" : null?>> BENAR </option>
                            <option value="salah" <?=$tarif == "salah" ? "selected" : null?>> SALAH </option>
                        </select>
                        <?=form_error('tarif')?>
                    </div>
                    <div class="form-group <?=form_error('bill')? 'has-error' : null?>">
                        <label for="bill">Bill/Bon Penjualan</label>
                        <select name="bill" class="form-control" id="bill">
                            <?php $bill=$this->input->post('bill') ? $this->input->post('bill') : $row->bill?>
                            <option value="ada" <?=$bill == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak" <?=$bill == "tidak" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('bill')?>
                    </div>
                    <div class="form-group <?=form_error('rekap_terima')? 'has-error' : null?>">
                        <label for="rekap_terima">Rekap Penerimaan Bulanan</label>
                        <select name="rekap_terima" class="form-control" id="rekap_terima">
                            <?php $rekap_terima=$this->input->post('rekap_terima') ? $this->input->post('rekap_terima') : $row->rekap_terima?>
                            <option value="ada" <?=$rekap_terima == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak" <?=$rekap_terima == "tidak" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('rekap_terima')?>
                    </div>
                    <div class="form-group <?=form_error('rekap_bill')? 'has-error' : null?>">
                        <label for="rekap_bill">Rekap Penggunaan Bill/Bon</label>
                        <select name="rekap_bill" class="form-control" id="rekap_bill">
                            <?php $rekap_bill=$this->input->post('rekap_bill') ? $this->input->post('rekap_bill') : $row->rekap_bill?>
                            <option value="ada" <?=$rekap_bill == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak" <?=$rekap_bill == "tidak" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('rekap_bill')?>
                    </div>
                    <br><br>
                    <div>
                        <h3 align="center">JENIS PEMBAYARAN</h3>
                    </div>
                    <div class="form-group <?=form_error('cash')? 'has-error' : null?>">
                        <label for="cash">Uang Kontan (Cash)</label>
                        <select name="cash" class="form-control" id="cash">
                            <?php $cash=$this->input->post('cash') ? $this->input->post('cash') : $row->cash?>
                            <option value="ya" <?=$cash == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=$cash == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('cash')?>
                    </div>
                    <div class="form-group <?=form_error('edc')? 'has-error' : null?>">
                        <label for="edc">Kartu Debit/Kredit (EDC)</label>
                        <select name="edc" class="form-control" id="edc">
                            <?php $edc=$this->input->post('edc') ? $this->input->post('edc') : $row->edc?>
                            <option value="ya" <?=$edc == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=$edc == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('edc')?>
                    </div>
                    <div class="form-group <?=form_error('emoney')? 'has-error' : null?>">
                        <label for="emoney">E-Money (OVO, GoPay, dan sejenisnya)</label>
                        <select name="emoney" class="form-control" id="emoney">
                            <?php $emoney=$this->input->post('emoney') ? $this->input->post('emoney') : $row->emoney?>
                            <option value="ya" <?=$emoney == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=$emoney == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('emoney')?>
                    </div>
                    <br><br><br>
                    <div class="form-group <?=form_error('ket')? 'has-error' : null?>">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control" maxlength="300"><?=$this->input->post('ket') ? $this->input->post('ket') : $row->ket?></textarea>
                        <?=form_error('ket')?>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn btn-success btn-flat margin pull-right">
                            <i class="fa fa-paper-plane"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-flat margin pull-right">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Daftar hiburan Daerah</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NPWPD</th>
                            <th>Nama Wajib Pajak</th>
                            <th>Alamat</th>
                            <th>Tipe Wajib Pajak</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($wp as $x => $data) { ?>
                        <tr>
                            <td><?=$data->npwpd?></td>
                            <td><?=$data->nama_wp?></td>
                            <td><?=$data->alamat?></td>
                            <td><?=ucwords($data->jenis_tipe)?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" id="mod" 
                                data-npwpd="<?=$data->npwpd?>"
                                data-nama_wp="<?=$data->nama_wp?>"
                                data-alamat="<?=$data->alamat?>"
                                data-no_telp="<?=$data->no_telp?>"
                                data-jenis_tipe="<?=$data->jenis_tipe?>"
                                data-tipe_id="<?=$data->tipe_id?>"
                                >
                                    <i class="fa fa-check"></i> Select
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('click','#mod', function(){
        var npwpd = $(this).data('npwpd');
        var nama_wp = $(this).data('nama_wp');
        var alamat = $(this).data('alamat');
        var no_telp = $(this).data('no_telp');
        var jenis_tipe = $(this).data('jenis_tipe');
        var tipe_id = $(this).data('tipe_id');
        $('#npwpd').val(npwpd);
        $('#nama_wp').val(nama_wp);
        $('#tipe_wp').val(jenis_tipe);
        $('#tipe_id').val(tipe_id);
        $('#modal-item').modal('hide');
    })
})
</script>