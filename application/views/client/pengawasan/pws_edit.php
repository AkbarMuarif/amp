<section class="content-header">
  <h1>
    Ubah Data Pengawasan <?=ucfirst($dt->ket_tipe)?>
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
                <?php echo form_open_multipart(current_url()) ?>
                    <div class="form-group">
                        <label for="no_pws">Nomor Pengawasan</label>
                        <input type="text" name="no_pws" id="no_pws" value="<?=$this->input->post('no_pws') ? $this->input->post('no_pws') : $row->no_pws?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pws">Tanggal Pengawasan</label>
                        <input type="date" id="tgl_pws" name="tgl_pws" value="<?=$this->input->post('tgl_pws') ? $this->input->post('tgl_pws') : $row->tgl_pws?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="npwpd" value="<?=$this->input->post('npwpd') ? $this->input->post('npwpd') : $row->npwpd?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipe_id" value="<?=$this->input->post('tipe_id') ? $this->input->post('tipe_id') : $row->tipe_id?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_wp">Nama Wajib Pajak</label>
                        <input type="text" name="nama_wp" value="<?=$this->input->post('nama_wp') ? $this->input->post('nama_wp') : $row->nama_wp?>" id="nama_wp" class="form-control" readonly>
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
                        <input type="date" id="tgl_bayar" name="tgl_bayar" value="<?=$this->input->post('tgl_bayar') ? $this->input->post('tgl_bayar') : $row->tgl_bayar?>" class="form-control">
                        <?=form_error('tgl_bayar')?> 
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
                        <label for="tarif">Tarif Pajak <?=$dt->pajak?>%</label>
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
                    <?php if ($dt->ket_tipe=='hotel') { ?>
                        <div class="form-group <?=form_error('ota')? 'has-error' : null?>">
                        <label for="ota">Online Travel Agent (OTA)</label>
                        <select name="ota" class="form-control" id="ota">
                            <?php $ota=$this->input->post('ota') ? $this->input->post('ota') : $row->ota?>
                            <option value="ya" <?=$ota == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=$ota == "tidak" ? "selected" : null?>> TIDAK </option>
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
                        <label for="ditempat">Makan di Tempat</label>
                        <select name="ditempat" class="form-control" id="ditempat">
                            <?php $ditempat=$this->input->post('ditempat') ? $this->input->post('ditempat') : $row->ditempat?>
                            <option value="ya" <?=$ditempat == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=$ditempat == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('ditempat')?>
                    </div>
                    <div class="form-group <?=form_error('pesan')? 'has-error' : null?>">
                        <label for="pesan">Pesan Antar Makanan</label>
                        <select name="pesan" class="form-control" id="pesan">
                            <?php $pesan=$this->input->post('pesan') ? $this->input->post('pesan') : $row->pesan?>
                            <option value="ya" <?=$pesan == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=$pesan == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('pesan')?>
                    </div>
                    <div class="form-group <?=form_error('catering')? 'has-error' : null?>">
                        <label for="catering">Catering</label>
                        <select name="catering" class="form-control" id="catering">
                            <?php $catering=$this->input->post('catering') ? $this->input->post('catering') : $row->catering?>
                            <option value="ya" <?=$catering == "ya" ? "selected" : null?>> YA </option>
                            <option value="tidak" <?=$catering == "tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('catering')?>
                    </div>
                    <?php } ?>
                    <br><br><br>
                    <div class="form-group <?=form_error('ket')? 'has-error' : null?>">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control"><?=set_value('ket')?></textarea>
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