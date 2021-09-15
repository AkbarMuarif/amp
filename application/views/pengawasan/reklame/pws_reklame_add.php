<section class="content-header">
  <h1>
    Pengawasan Reklame
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Pws_reklame</li>
    <li class="active">Add</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>Tambah Data Pengawasan</b></h3>
            <div class="pull-right">
                <a href="<?= site_url('pws_reklame')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php $this->view('pesan')?>
                <?php // echo validation_errors(); ?>
                <?php echo form_open_multipart('pws_reklame/add') ?>
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
                        <label for="npwpd">NPWPD</label>
                        <div class="form-group input-group">
                            <input type="text" name="npwpd" id="npwpd" class="form-control" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('nama_wp')? 'has-error' : null?>">
                        <label for="nama_wp">Nama Wajib Pajak</label>
                        <input type="text" name="nama_wp" id="nama_wp" class="form-control" readonly>
                        <?=form_error('nama_wp')?>
                    </div>
                    <div class="form-group <?=form_error('izin')? 'has-error' : null?>">
                        <label for="izin">Izin</label>
                        <select name="izin" class="form-control" id="izin">
                            <option value="">- Pilih -</option>
                            <option value="ada" <?=set_value('izin') == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak" <?=set_value('izin') == "tidak ada" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('izin')?>
                    </div>
                    <div class="form-group <?=form_error('tgl_bayar')? 'has-error' : null?>">
                        <label for="tgl_bayar">Tanggal Bayar</label>
                        <input type="date" id="tgl_bayar" name="tgl_bayar" value="<?=set_value('tgl_bayar')?>" class="form-control" readonly>
                        <?=form_error('tgl_bayar')?> 
                    </div>
                    <div class="form-group <?=form_error('masa')? 'has-error' : null?>">
                        <label for="masa">Masa Berlaku Reklame <small>(Dalam Hari)</small></label>
                        <input type="text" name="masa" id="masa" class="form-control" maxlength="4" readonly>
                        <?=form_error('masa')?>
                    </div>
                    <div class="form-group <?=form_error('jenis')? 'has-error' : null?>">
                        <label for="jenis">Jenis Reklame</label>
                        <select name="jenis" class="form-control" id="jenis">
                            <option value="">- Pilih -</option>
                            <option value="kain" <?=set_value('jenis') == "ada" ? "selected" : null?>> Reklame Kain </option>
                            <option value="stiker" <?=set_value('jenis') == "tidak" ? "selected" : null?>> Reklame Melekat, Stiker </option>
                            <option value="selebaran" <?=set_value('jenis') == "selebaran" ? "selected" : null?>> Reklame Selebaran </option>
                            <option value="berjalan" <?=set_value('jenis') == "berjalan" ? "selected" : null?>> Reklame Berjalan </option>
                            <option value="udara" <?=set_value('jenis') == "udara" ? "selected" : null?>> Reklame Udara </option>
                            <option value="apung" <?=set_value('jenis') == "apung" ? "selected" : null?>> Reklame Apung </option>
                            <option value="suara" <?=set_value('jenis') == "suara" ? "selected" : null?>> Reklame Suara </option>
                            <option value="film" <?=set_value('jenis') == "film" ? "selected" : null?>> Reklame Film </option>
                            <option value="peragaan" <?=set_value('jenis') == "peragaan" ? "selected" : null?>> Reklame Peragaan </option>
                        </select>
                        <?=form_error('jenis')?>
                    </div>
                    <div class="form-group <?=form_error('ukuran')? 'has-error' : null?>">
                        <label for="ukuran">Ukuran Reklame</label>
                        <input type="text" name="ukuran" value="<?=set_value('ukuran')?>" id="ukuran" maxlength="50" class="form-control">
                        <?=form_error('ukuran')?>
                    </div>
                    <div class="form-group <?=form_error('teks')? 'has-error' : null?>">
                        <label for="teks">Teks/Gambar isi Reklame</label>
                        <input type="text" name="teks" value="<?=set_value('teks')?>" id="teks" maxlength="100" class="form-control">
                        <?=form_error('teks')?>
                    </div>
                    <div class="form-group <?=form_error('lokasi')? 'has-error' : null?>">
                        <label for="lokasi">Lokasi Reklame</label>
                        <input type="text" name="lokasi" value="<?=set_value('lokasi')?>" id="lokasi" maxlength="150" class="form-control">
                        <?=form_error('lokasi')?>
                    </div>
                    <div class="form-group <?=form_error('status_tempat')? 'has-error' : null?>">
                        <label for="status_tempat">Status Tempat Pemasangan Reklame</label>
                        <select name="status_tempat" class="form-control" id="status_tempat">
                            <option value="">- Pilih -</option>
                            <option value="tanah negara" <?=set_value('status_tempat') == "tanah negara" ? "selected" : null?>> TANAH NEGARA </option>
                            <option value="halaman sendiri/sewa tanah" <?=set_value('status_tempat') == "halaman sendiri/sewa tanah" ? "selected" : null?>> HALAMAN SENDIRI/SEWA TANAH</option>
                            <option value="nempel bangunan/atas bangunan" <?=set_value('status_tempat') == "nempel bangunan/atas bangunan" ? "selected" : null?>> NEMPEL BANGUNAN/ATAS BANGUNAN </option>
                            <option value="reklame bergerak" <?=set_value('status_tempat') == "reklame bergerak" ? "selected" : null?>> REKLAME BERGERAK </option>
                        </select>
                        <?=form_error('status_tempat')?>
                    </div>
                    <div class="form-group <?=form_error('status_pasang')? 'has-error' : null?>">
                        <label for="status_pasang">Status Pemasangan Reklame</label>
                        <select name="status_pasang" class="form-control" id="status_pasang">
                            <option value="">- Pilih -</option>
                            <option value="sesuai ketentuan peraturan yang berlaku" <?=set_value('status_pasang') == "sesuai ketentuan" ? "selected" : null?>> SESUAI KETENTUAN PERATURAN YANG BERLAKU </option>
                            <option value="melanggar ketentuan peraturan yang berlaku" <?=set_value('status_pasang') == "melanggar ketentuan" ? "selected" : null?>> MELANGGAR KETENTUAN PERATURAN YANG BERLAKU </option>
                        </select>
                        <?=form_error('status_pasang')?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Submit
                        </button>
                        <button type="reset" class="btn bg-red btn-flat">
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
                <h4 class="modal-title">Daftar Wajib Pajak Daerah</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NPWPD</th>
                            <th>Nama WP</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Jenis</th>
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
                            <td><?=$data->ket_tipe?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" id="mod" 
                                data-npwpd="<?=$data->npwpd?>"
                                data-nama_wp="<?=$data->nama_wp?>"
                                data-alamat="<?=$data->alamat?>"
                                data-no_telp="<?=$data->no_telp?>"
                                data-ket_tipe="<?=$data->ket_tipe?>"
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
    $("#izin").change(function() {
        var izin = $("#izin").val();
        if (izin == "ada") {
        $('#tgl_bayar').removeAttr('readonly');
        $('#masa').removeAttr('readonly');
        } else {
        $('#tgl_bayar').attr('readonly','true');
        $('#masa').attr('readonly','true');
        $('#tgl_bayar').val(null);
	    $('#masa').val(null);
        }
    })
})
</script>