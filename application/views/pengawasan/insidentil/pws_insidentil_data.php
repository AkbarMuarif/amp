<section class="content-header">
  <h1>
    Pengawasan
    <b>Insidentil</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pengawasan</li>
    <li class="active">Insidentil</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pengawasan Pajak Insidentil</h3>
            <div class="pull-right">
                <a href="<?= site_url('pws_insidentil/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Add
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>No Pengawasan</th>
                        <th>Tanggal</th>
                        <th>Nama Penyelenggara</th>
                        <th>Alamat Penyelenggara</th>
                        <th>Tempat Acara</th>
                        <th class="text-center" width="150px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; 
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $data->no_pws?></td>
                        <td><?= indo_date($data->tgl_pws)?></td>
                        <td><?= $data->nama_p?></td>
                        <td><?= $data->alamat_p?></td>
                        <td><?= $data->tempat?></td>
                        <td class="text-center">
                            <a id="set_dtl" class="btn btn-default btn-sm" 
                                data-toggle="modal" 
                                data-target="#modal-detail"
                                data-no_pws="<?=$data->no_pws?>"
                                data-tgl_pws="<?=indo_date($data->tgl_pws)?>"
                                data-npwpd="<?=$data->npwpd?>"
                                data-nama_p="<?=$data->nama_p?>"
                                data-alamat_p="<?=$data->alamat_p?>"
                                data-no_telp_p="<?=$data->no_telp_p?>"
                                data-tempat="<?=$data->tempat?>"
                                data-sah="<?=$data->sah?>"
                                data-harga="<?=$data->harga?>"
                                data-seri="<?=$data->seri?>"
                                data-sobek="<?=$data->sobek?>"
                                data-simpan="<?=$data->simpan?>"
                                data-lapor="<?=$data->lapor?>"
                                data-tgl_bayar="<?=indo_date($data->tgl_bayar)?>"
                                data-ket="<?=$data->ket?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?= site_url('pws_insidentil/edit/'.$data->no_pws)?>" class="btn bg-teal btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a> 
                            <a href="<?= site_url('pws_insidentil/del/'.$data->no_pws)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a> 
                            <a href="<?= site_url('pws_insidentil/surat/'.$data->no_pws)?>" target="blank" class="btn bg-green btn-sm">
                                <i class="fa fa-print"></i>
                            </a>  
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="box-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <label for="tgl_awal">Dari Tanggal : </label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="tgl_awal">Sampai Tanggal : </label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                    </div>
                    <br>
                    <div class="col-md-2">
                        <button type="submit" name="cetak" class="btn btn-success btn-normal" formtarget="_blank">CETAK REKAP</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail Data Pengawasan Pajak</h4>
                <span>No : </span><span id="no_pws"></span>
                <br>
                <span>Tanggal : </span><span id="tgl_pws"> </span>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <td colspan="2" align="center"><b>DATA PENYELENGGARA</b></td>
                        </tr>
                        <tr>
                            <th>NPWPD</th>
                            <td><span id="npwpd"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Penyelenggara</th>
                            <td><span id="nama_p"></span></td>
                        </tr>
                        <tr>
                            <th>Alamat Penyelenggara</th>
                            <td><span id="alamat_p"></span></td>
                        </tr>
                        <tr>
                            <th>No. Telepon Penyelenggara</th>
                            <td><span id="no_telp_p"></span></td>
                        </tr>
                        <tr>
                            <th>Tempat Penyelenggaraan Acara</th>
                            <td><span id="tempat"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><b>TANDA MASUK</b></td>
                        </tr>
                        <tr>
                            <th>Telah Disahkan Pemko Banjarmasin</th>
                            <td><span id="sah"></span></td>
                        </tr>
                        <tr>
                            <th>Tertera Harga Tanda Masuk</th>
                            <td><span id="harga"></span></td>
                        </tr>
                        <tr>
                            <th>Tertera Nomor Seri/Urut</th>
                            <td><span id="seri"></span></td>
                        </tr>
                        <tr>
                            <th>Dilakukan Penyobekan di Bagian Tertentu</th>
                            <td><span id="sobek"></span></td>
                        </tr>
                        <tr>
                            <th>Menyimpan Bagian yang di Sobek</th>
                            <td><span id="simpan"></span></td>
                        </tr>
                        <tr>
                            <th>Dibuat Laporan Penjualan</th>
                            <td><span id="lapor"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><b>KETERANGAN TAMBAHAN</b></td>
                        </tr>
                        <tr>
                            <th>Tanggal Bayar</th>
                            <td><span id="tgl_bayar"></span></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><span id="ket"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('click','#set_dtl', function(){
        var no_pws = $(this).data('no_pws');
        var tgl_pws = $(this).data('tgl_pws');
        var npwpd = $(this).data('npwpd');
        var nama_p = $(this).data('nama_p');
        var alamat_p = $(this).data('alamat_p');
        var no_telp_p = $(this).data('no_telp_p');
        var tempat = $(this).data('tempat');
        var sah = $(this).data('sah');
        var harga = $(this).data('harga');
        var seri = $(this).data('seri');
        var sobek = $(this).data('sobek');
        var simpan = $(this).data('simpan');
        var lapor = $(this).data('lapor');
        var tgl_bayar = $(this).data('tgl_bayar');
        var ket = $(this).data('ket');
        //menampilkan data pada modal'
        $('#no_pws').text(no_pws);
        $('#tgl_pws').text(tgl_pws);
        $('#npwpd').text(npwpd);
        $('#nama_p').text(nama_p);
        $('#alamat_p').text(alamat_p);
        $('#no_telp_p').text(no_telp_p);
        $('#tempat').text(tempat);
        $('#sah').text(sah);
        $('#harga').text(harga);
        $('#seri').text(seri);
        $('#sobek').text(sobek);
        $('#simpan').text(simpan);
        $('#lapor').text(lapor);
        $('#tgl_bayar').text(tgl_bayar);
        $('#ket').text(ket);
        // =========================
    })
})
</script>