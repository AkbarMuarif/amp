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
            <h3 class="box-title"><b>Ubah Data Pengawasan</b></h3>
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
                <?php echo form_open_multipart(current_url()) ?>
                    <div>
                        <input type="hidden" name="no_pws" value="<?=$row->no_pws?>" class="form-control">
                    </div>
                    <div class="form-group <?=form_error('tgl_pws')? 'has-error' : null?>">
                        <label for="tgl_pws">Tanggal Pengawasan</label>
                        <input type="date" id="tgl_pws" name="tgl_pws" value="<?=$this->input->post('tgl_pws') ? $this->input->post('tgl_pws') : $row->tgl_pws?>" class="form-control">
                        <?=form_error('tgl_pws')?> 
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
                        <input type="text" name="nama_wp" id="nama_wp" value="<?=$this->input->post('nama_wp') ? $this->input->post('nama_wp') : $row->nama_wp?>" class="form-control" readonly>
                        <?=form_error('nama_wp')?>
                    </div>
                    <div class="form-group <?=form_error('izin')? 'has-error' : null?>">
                        <label for="izin">Izin</label>
                        <select name="izin" class="form-control" id="izin">
                            <?php $izin=$this->input->post('izin') ? $this->input->post('izin') : $row->izin?>
                            <option value="ada"  <?=$izin == "ada" ? "selected" : null?>> ADA </option>
                            <option value="tidak"  <?=$izin == "tidak ada" ? "selected" : null?>> TIDAK ADA </option>
                        </select>
                        <?=form_error('izin')?>
                    </div>
                    <div class="form-group <?=form_error('tgl_bayar')? 'has-error' : null?>">
                        <label for="tgl_bayar">Tanggal Bayar</label>
                        <input type="date" id="tgl_bayar" name="tgl_bayar" value="<?=$this->input->post('tgl_bayar') ? $this->input->post('tgl_bayar') : $row->tgl_bayar?>" class="form-control" readonly>
                        <?=form_error('tgl_bayar')?> 
                    </div>
                    <div class="form-group <?=form_error('masa')? 'has-error' : null?>">
                        <label for="masa">Masa Berlaku Reklame <small>(Dalam Hari)</small></label>
                        <input type="text" name="masa" id="masa" class="form-control" maxlength="4" value="<?=$this->input->post('masa') ? $this->input->post('masa') : $row->masa?>" readonly>
                        <?=form_error('masa')?>
                    </div>
                    <div class="form-group <?=form_error('jenis')? 'has-error' : null?>">
                        <label for="jenis">Jenis Reklame</label>
                        <select name="jenis" class="form-control" id="jenis">
                            <?php $jenis=$this->input->post('jenis') ? $this->input->post('jenis') : $row->jenis?>
                            <option value="kain" <?=$jenis == "kain" ? "selected" : null?>> Reklame Kain </option>
                            <option value="stiker" <?=$jenis == "stiker" ? "selected" : null?>> Reklame Melekat, Stiker </option>
                            <option value="selebaran" <?=$jenis == "selebaran" ? "selected" : null?>> Reklame Selebaran </option>
                            <option value="berjalan" <?=$jenis == "berjalan" ? "selected" : null?>> Reklame Berjalan </option>
                            <option value="udara" <?=$jenis == "udara" ? "selected" : null?>> Reklame Udara </option>
                            <option value="apung" <?=$jenis == "apung" ? "selected" : null?>> Reklame Apung </option>
                            <option value="suara" <?=$jenis == "suara" ? "selected" : null?>> Reklame Suara </option>
                            <option value="film" <?=$jenis == "film" ? "selected" : null?>> Reklame Film </option>
                            <option value="peragaan" <?=$jenis == "peragaan" ? "selected" : null?>> Reklame Peragaan </option>
                        </select>
                        <?=form_error('jenis')?>
                    </div>
                    <div class="form-group <?=form_error('ukuran')? 'has-error' : null?>">
                        <label for="ukuran">Ukuran Reklame</label>
                        <input type="text" name="ukuran" maxlength="50" value="<?=$this->input->post('ukuran') ? $this->input->post('ukuran') : $row->ukuran?>" id="ukuran" class="form-control">
                        <?=form_error('ukuran')?>
                    </div>
                    <div class="form-group <?=form_error('teks')? 'has-error' : null?>">
                        <label for="teks">Teks/Gambar isi Reklame</label>
                        <input type="text" name="teks" maxlength="100" value="<?=$this->input->post('teks') ? $this->input->post('teks') : $row->teks?>" id="teks" class="form-control">
                        <?=form_error('teks')?>
                    </div>
                    <div class="form-group <?=form_error('lokasi')? 'has-error' : null?>">
                        <label for="lokasi">Lokasi Reklame</label>
                        <input type="text" name="lokasi" maxlength="150" value="<?=$this->input->post('lokasi') ?$this->input->post('lokasi') : $row->lokasi?>" id="lokasi" class="form-control">
                        <?=form_error('lokasi')?>
                    </div>
                    <div class="form-group <?=form_error('status_tempat')? 'has-error' : null?>">
                        <label for="status_tempat">Status Tempat Pemasangan Reklame</label>
                        <select name="status_tempat" class="form-control" id="status_tempat">
                            <?php $status_tempat=$this->input->post('status_tempat') ? $this->input->post('status_tempat') : $row->status_tempat?>
                            <option value="tanah negara" <?=$status_tempat == "tanah negara" ? "selected" : null?>> TANAH NEGARA </option>
                            <option value="halaman sendiri/sewa tanah" <?=$status_tempat == "halaman sendiri/sewa tanah" ? "selected" : null?>> HALAMAN SENDIRI/SEWA TANAH</option>
                            <option value="nempel bangunan/atas bangunan" <?=$status_tempat == "nempel bangunan/atas bangunan" ? "selected" : null?>> NEMPEL BANGUNAN/ATAS BANGUNAN </option>
                            <option value="reklame bergerak" <?=$status_tempat == "reklame bergerak" ? "selected" : null?>> REKLAME BERGERAK </option>
                        </select>
                        <?=form_error('status_tempat')?>
                    </div>
                    <div class="form-group <?=form_error('status_pasang')? 'has-error' : null?>">
                        <label for="status_pasang">Status Pemasangan Reklame</label>
                        <select name="status_pasang" class="form-control" id="status_pasang">
                            <?php $status_pasang=$this->input->post('status_pasang') ? $this->input->post('status_pasang') : $row->status_pasang?>
                            <option value="sesuai ketentuan peraturan yang berlaku" <?=$status_pasang == "sesuai ketentuan" ? "selected" : null?>> SESUAI KETENTUAN PERATURAN YANG BERLAKU </option>
                            <option value="melanggar ketentuan peraturan yang berlaku" <?=$status_pasang == "melanggar ketentuan" ? "selected" : null?>> MELANGGAR KETENTUAN PERATURAN YANG BERLAKU </option>
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