<section class="content-header">
  <h1>
    Lapor Data Pengawasan <?=ucfirst($dt->ket_tipe)?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">wp_lapor</li>
  </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">NPWPD : <?=$dt->npwpd?></h3>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php $this->view('pesan')?>
                <?php // echo validation_errors(); ?>
                <?php echo form_open_multipart('wp_lapor') ?>
                    <div class="form-group">
                        <label for="no_pws">Nomor Pengawasan</label>
                        <input type="text" name="no_pws" id="no_pws" value="<?=$nmr?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pws">Tanggal Pengawasan</label>
                        <input type="date" id="tgl_pws" name="tgl_pws" value="<?=date('Y-m-d')?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="npwpd" value="<?=$dt->npwpd?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipe_id" value="<?=$dt->tipe_id?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_wp">Nama Wajib Pajak</label>
                        <input type="text" name="nama_wp" value="<?=$dt->nama_wp?>" id="nama_wp" class="form-control" readonly>
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
                        <label for="tarif">Tarif Pajak <?=$dt->pajak?>%</label>
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
                    <?php if ($dt->ket_tipe=='hotel') { ?>
                    <div class="form-group <?=form_error('ota')? 'has-error' : null?>">
                        <label for="ota">Online Travel Agent (OTA)</label>
                        <select name="ota" class="form-control" id="ota">
                            <option value="">- Pilih -</option>
                            <option value="ya" <?=set_value('ota') == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=set_value('ota') == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('ota')?>
                    </div>
                    <?php } ?>
                    <?php if ($dt->ket_tipe=='restoran') { ?>
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
                    <?php } ?>
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