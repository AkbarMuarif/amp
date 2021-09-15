<section class="content-header">
  <h1>
    Pengawasan
    <b>insidentil</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pengawasan</li>
    <li class="active">insidentil</li>
    <li class="active">edit</li>
  </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ubah Data Pengawasan</h3>
            <div class="pull-right">
                <a href="<?= site_url('pws_insidentil')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php $this->view('pesan')?>
                <?php // echo validation_errors(); ?>
                <form action="" method="post">
                    <div class="form-group <?=form_error('no_pws')? 'has-error' : null?>">
                        <label for="no_pws">Nomor Pengawasan</label>
                        <input type="text" name="no_pws" id="no_pws" value="<?=$row->no_pws?>" class="form-control" readonly>
                        <?=form_error('no_pws')?>
                    </div>
                    <div class="form-group <?=form_error('tgl_pws')? 'has-error' : null?>">
                        <label for="tgl_pws">Tanggal Pengawasan</label>
                        <input type="date" id="tgl_pws" name="tgl_pws" value="<?=$this->input->post('tgl_pws') ? $this->input->post('tgl_pws') : $row->tgl_pws?>" class="form-control">
                        <?=form_error('tgl_pws')?> 
                    </div>
                    <br><br>
                    <div>
                        <h4 align="center">DATA PENYELENGGARA</h4>
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
                    <div class="form-group <?=form_error('nama_p')? 'has-error' : null?>">
                        <label for="nama_p">Nama Penyelenggara</label>
                        <div class="input-group">
                            <input type="text" name="nama_p" value="<?=$this->input->post('nama_p') ? $this->input->post('nama_p') : $row->nama_p?>" id="nama_p" class="form-control" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" onclick="umum()">UMUM</button>
                                <script>
                                    function umum(){
                                        $('#nama_p').removeAttr('readonly');
                                        $('#alamat_p').removeAttr('readonly');
                                        $('#no_telp_p').removeAttr('readonly');
                                        $('#npwpd').val(null);
                                        $('#nama_p').val(null);
                                        $('#alamat_p').val(null);
                                        $('#no_telp_p').val(null);
                                        $('#modal-item').modal('hide');
                                    }
                                </script>
                            </span>
                        </div>
                        <?=form_error('nama_p')?>
                    </div>
                    <div class="form-group <?=form_error('alamat_p')? 'has-error' : null?>">
                        <label for="alamat_p">Alamat Penyelenggara</label>
                        <input type="text" name="alamat_p" value="<?=$this->input->post('alamat_p') ? $this->input->post('alamat_p') : $row->alamat_p?>" id="alamat_p" class="form-control" readonly>
                        <?=form_error('alamat_p')?>
                    </div>
                    <div class="form-group <?=form_error('no_telp_p')? 'has-error' : null?>">
                        <label for="no_telp_p">Nomor Telepon Penyelenggara</label>
                        <input type="text" name="no_telp_p" value="<?=$this->input->post('no_telp_p') ? $this->input->post('no_telp_p') : $row->no_telp_p?>" id="no_telp_p" class="form-control" readonly>
                        <?=form_error('no_telp_p')?>
                    </div>
                    <div class="form-group <?=form_error('tempat')? 'has-error' : null?>">
                        <label for="tempat">Tempat Penyelenggaraan Acara</label>
                        <input type="text" name="tempat" value="<?=$this->input->post('tempat') ? $this->input->post('tempat') : $row->tempat?>" id="tempat" class="form-control"  maxlength="100">
                        <?=form_error('tempat')?>
                    </div>
                    <br><br>
                    <div>
                        <h4 align="center">TANDA MASUK</h4>
                    </div>
                    <div class="form-group <?=form_error('sah')? 'has-error' : null?>">
                        <label for="sah">Telah Disahkan Pemko Banjarmasin</label>
                        <select name="sah" class="form-control" id="sah">
                            <?php $sah=$this->input->post('sah') ? $this->input->post('sah') : $row->sah?>
                            <option value="Ya" <?=$sah == "Ya" ? "selected" : null?>> YA </option>
                            <option value="Tidak" <?=$sah == "Tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('sah')?>
                    </div>
                    <div class="form-group <?=form_error('harga')? 'has-error' : null?>">
                        <label for="harga">Tertera Harga Tanda Masuk</label>
                        <select name="harga" class="form-control" id="harga">
                            <?php $harga=$this->input->post('harga') ? $this->input->post('harga') : $row->harga?>
                            <option value="Ya" <?=$harga == "Ya" ? "selected" : null?>> YA </option>
                            <option value="Tidak" <?=$harga == "Tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('harga')?>
                    </div>
                    <div class="form-group <?=form_error('seri')? 'has-error' : null?>">
                        <label for="seri">Tertera Nomor Seri/Urut</label>
                        <select name="seri" class="form-control" id="seri">
                            <?php $seri=$this->input->post('seri') ? $this->input->post('seri') : $row->seri?>
                            <option value="Ya" <?=$seri == "Ya" ? "selected" : null?>> YA </option>
                            <option value="Tidak" <?=$seri == "Tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('seri')?>
                    </div>
                    <div class="form-group <?=form_error('sobek')? 'has-error' : null?>">
                        <label for="sobek">Dilakukan Penyobekan di Bagian Tertentu</label>
                        <select name="sobek" class="form-control" id="sobek">
                            <?php $sobek=$this->input->post('sobek') ? $this->input->post('sobek') : $row->sobek?>
                            <option value="Ya" <?=$sobek == "Ya" ? "selected" : null?>> YA </option>
                            <option value="Tidak" <?=$sobek == "Tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('sobek')?>
                    </div>
                    <div class="form-group <?=form_error('simpan')? 'has-error' : null?>">
                        <label for="simpan">Menyimpan Bagian yang di Sobek</label>
                        <select name="simpan" class="form-control" id="simpan">
                            <?php $simpan=$this->input->post('simpan') ? $this->input->post('simpan') : $row->simpan?>
                            <option value="Ya" <?=$simpan == "Ya" ? "selected" : null?>> YA </option>
                            <option value="Tidak" <?=$simpan == "Tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('simpan')?>
                    </div>
                    <div class="form-group <?=form_error('lapor')? 'has-error' : null?>">
                        <label for="lapor">Dibuat Laporan Penjualan</label>
                        <select name="lapor" class="form-control" id="lapor">
                            <?php $lapor=$this->input->post('lapor') ? $this->input->post('lapor') : $row->lapor?>
                            <option value="Ya" <?=$lapor == "Ya" ? "selected" : null?>> YA </option>
                            <option value="Tidak" <?=$lapor == "Tidak" ? "selected" : null?>> TIDAK </option>
                        </select>
                        <?=form_error('lapor')?>
                    </div>
                    <br><br>
                    <div>
                        <h4 align="center">KETERANGAN TAMBAHAN</h4>
                    </div>
                    <div class="form-group <?=form_error('tgl_bayar')? 'has-error' : null?>">
                        <label for="tgl_bayar">Tanggal Bayar</label>
                        <input type="date" id="tgl_bayar" name="tgl_bayar" value="<?=$this->input->post('tgl_bayar') ? $this->input->post('tgl_bayar') : $row->tgl_bayar?>" class="form-control">
                        <?=form_error('tgl_bayar')?> 
                    </div>
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
                </form>
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
                <h4 class="modal-title">Daftar insidentil Daerah</h4>
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
        $('#nama_p').attr('readonly','true');
        $('#alamat_p').attr('readonly','true');
        $('#no_telp_p').attr('readonly','true');
        $('#npwpd').val(npwpd);
        $('#nama_p').val(nama_wp);
        $('#alamat_p').val(alamat);
        $('#no_telp_p').val(no_telp);
        $('#modal-item').modal('hide');
    })
})
</script>