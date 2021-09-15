<section class="content-header">
  <h1>
    Pengawasan
    <b>restoran</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pengawasan</li>
    <li class="active">restoran</li>
    <li class="active">Add</li>
  </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Pengawasan</h3>
            <div class="pull-right">
                <a href="<?= site_url('pws_restoran')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php $this->view('pesan')?>
                <?php // echo validation_errors(); ?>
                <?php echo form_open_multipart('pws_restoran/add') ?>
                    <div class="form-group <?=form_error('no_pws')? 'has-error' : null?>">
                        <label for="no_pws">Nomor Pengawasan</label>
                        <input type="text" name="no_pws" id="no_pws" value="<?=set_value('no_pws') != null ? set_value('no_pws') : $nmr ?>" class="form-control" maxlength="30" autofocus>
                        <?=form_error('no_pws')?>
                    </div>
                    <div class="form-group <?=form_error('tgl_pws')? 'has-error' : null?>">
                        <label for="tgl_pws">Tanggal Pengawasan</label>
                        <input type="date" id="tgl_pws" name="tgl_pws" value="<?=set_value('tgl_pws')?>" class="form-control">
                        <?=form_error('tgl_pws')?> 
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipe_id" value="<?=$tipeid->tipe_id?>">
                    </div>
                    <div class="form-group">
                        <label for="npwpd">NPWPD</label>
                        <div class="form-group input-group">
                            <input type="text" name="npwpd" id="npwpd" class="form-control" value="<?=set_value('npwpd')?>" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('nama_wp')? 'has-error' : null?>">
                        <label for="nama_wp">Nama Wajib Pajak</label>
                        <input type="text" name="nama_wp" value="<?=set_value('nama_wp')?>" id="nama_wp" class="form-control" readonly>
                        <?=form_error('nama_wp')?>
                    </div>
                    <div class="form-group">
                        <label>SSPD</label>
                        <input type="file" name="sspd" value="<?=set_value('sspd')?>" class="form-control">
                        <small>.Pdf (maksimal 2MB)</small>
                    </div>
                    <div class="form-group">
                        <label>SPTPD</label>
                        <input type="file" name="sptpd" value="<?=set_value('sptpd')?>" class="form-control">
                        <small>.Pdf (maksimal 2MB)</small>
                    </div>
                    <div class="form-group <?=form_error('tgl_bayar')? 'has-error' : null?>">
                        <label for="tgl_bayar">Tanggal Bayar Terakhir</label>
                        <input type="date" id="tgl_bayar" name="tgl_bayar" value="<?=set_value('tgl_bayar')?>" class="form-control">
                        <?=form_error('tgl_bayar')?> 
                    </div>
                    <div class="form-group <?=form_error('izin')? 'has-error' : null?>">
                        <label for="izin">Izin</label>
                        <select name="izin" class="form-control" id="izin">
                            <option value="">- Pilih -</option>
                            <option value="ada" <?=set_value('izin') == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak ada" <?=set_value('izin') == "tidak ada" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('izin')?>
                    </div>
                    <div class="form-group <?=form_error('tarif')? 'has-error' : null?>">
                        <label for="tarif">Tarif Pajak <?=$tipeid->pajak?>%</label>
                        <select name="tarif" class="form-control" id="tarif">
                            <option value="">- Pilih -</option>
                            <option value="benar" <?=set_value('tarif') == "benar" ? "selected" : null?>> BENAR </option>
                            <option value="salah" <?=set_value('tarif') == "salah" ? "selected" : null?>> SALAH </option>
                        </select>
                        <?=form_error('tarif')?>
                    </div>
                    <div class="form-group <?=form_error('bill')? 'has-error' : null?>">
                        <label for="bill">Bill/Bon Penjualan</label>
                        <select name="bill" class="form-control" id="bill">
                            <option value="">- Pilih -</option>
                            <option value="ada" <?=set_value('bill') == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak ada" <?=set_value('bill') == "tidak ada" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('bill')?>
                    </div>
                    <div class="form-group <?=form_error('rekap_terima')? 'has-error' : null?>">
                        <label for="rekap_terima">Rekap Penerimaan Bulanan</label>
                        <select name="rekap_terima" class="form-control" id="rekap_terima">
                            <option value="">- Pilih -</option>
                            <option value="ada" <?=set_value('rekap_terima') == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak ada" <?=set_value('rekap_terima') == "tidak ada" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('rekap_terima')?>
                    </div>
                    <div class="form-group <?=form_error('rekap_bill')? 'has-error' : null?>">
                        <label for="rekap_bill">Rekap Penggunaan Bill/Bon</label>
                        <select name="rekap_bill" class="form-control" id="rekap_bill">
                            <option value="">- Pilih -</option>
                            <option value="ada" <?=set_value('rekap_bill') == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak ada" <?=set_value('rekap_bill') == "tidak ada" ? "selected" : null?>> TIDAK ADA </option>
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
                            <option value="">- Pilih -</option>
                            <option value="ya" <?=set_value('cash') == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=set_value('cash') == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('cash')?>
                    </div>
                    <div class="form-group <?=form_error('edc')? 'has-error' : null?>">
                        <label for="edc">Kartu Debit/Kredit (EDC)</label>
                        <select name="edc" class="form-control" id="edc">
                            <option value="">- Pilih -</option>
                            <option value="ya" <?=set_value('edc') == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=set_value('edc') == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('edc')?>
                    </div>
                    <div class="form-group <?=form_error('emoney')? 'has-error' : null?>">
                        <label for="emoney">E-Money (OVO, GoPay, dan sejenisnya)</label>
                        <select name="emoney" class="form-control" id="emoney">
                            <option value="">- Pilih -</option>
                            <option value="ya" <?=set_value('emoney') == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=set_value('emoney') == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('emoney')?>
                    </div>
                    <br><br>
                    <div>
                        <h3 align="center">JENIS PELAYANAN</h3>
                    </div>
                    <div class="form-group <?=form_error('ditempat')? 'has-error' : null?>">
                        <label for="ditempat">Makan Ditempat</label>
                        <select name="ditempat" class="form-control" id="ditempat">
                            <option value="">- Pilih -</option>
                            <option value="ya" <?=set_value('ditempat') == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=set_value('ditempat') == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('ditempat')?>
                    </div>
                    <div class="form-group <?=form_error('pesan')? 'has-error' : null?>">
                        <label for="pesan">Pesan Antar Makanan</label>
                        <select name="pesan" class="form-control" id="pesan">
                            <option value="">- Pilih -</option>
                            <option value="ya" <?=set_value('pesan') == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=set_value('pesan') == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('pesan')?>
                    </div>
                    <div class="form-group <?=form_error('catering')? 'has-error' : null?>">
                        <label for="catering">Catering</label>
                        <select name="catering" class="form-control" id="catering">
                            <option value="">- Pilih -</option>
                            <option value="ya" <?=set_value('catering') == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=set_value('catering') == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('catering')?>
                    </div>
                    <br><br><br>
                    <div class="form-group <?=form_error('ket')? 'has-error' : null?>">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control" maxlength="300"><?=set_value('ket')?></textarea>
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
                <h4 class="modal-title">Daftar restoran Daerah</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NPWPD</th>
                            <th>Nama Wajib Pajak</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($wp as $x => $data) { ?>
                        <tr>
                            <td><?=$data->npwpd?></td>
                            <td><?=$data->nama_wp?></td>
                            <td><?=$data->alamat?></td>
                            <td><?=$data->no_telp?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" id="mod" 
                                data-npwpd="<?=$data->npwpd?>"
                                data-nama_wp="<?=$data->nama_wp?>"
                                data-alamat="<?=$data->alamat?>"
                                data-no_telp="<?=$data->no_telp?>"
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
        $('#npwpd').val(npwpd);
        $('#nama_wp').val(nama_wp);
        $('#modal-item').modal('hide');
    })
})
</script>