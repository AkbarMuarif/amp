<section class="content-header">
  <h1>
    Pengawasan
    <b>Reklame</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pengawasan</li>
    <li class="active">Reklame</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header with-border">
            <?php if ($page == 'berizin') { ?>
                <h3 class="box-title">Data Pengawasan Pajak Reklame</h3>
            <?php } else if ($page == 'takizin') { ?>
                <h3 class="box-title">Data Pengawasan Pajak Reklame Tidak Berizin</h3>
            <?php } else if ($page == 'takbayar') { ?>
                <h3 class="box-title">Data Pengawasan Pajak Reklame Tidak Bayar(Terhutang)</h3>
            <?php } ?>
            <?php if ($page == 'berizin') { ?>
                <div class="pull-right">
                    <a href="<?= site_url('pws_reklame/tidak_izin')?>" class="btn btn-danger btn-flat">
                        <i class="fa fa-info"></i> Data Reklame Tidak Resmi
                    </a>
                    <a href="<?= site_url('pws_reklame/tidak_bayar')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-info"></i> Data Reklame Tidak Bayar
                    </a>
                    <a href="<?= site_url('pws_reklame/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i> Add
                    </a>
                </div>
            <?php } else if ($page == 'takizin' || $page == 'takbayar') { ?>
                <div class="pull-right">
                    <a href="<?= site_url('pws_reklame')?>" class="btn bg-green btn-flat">
                        <i class="fa fa-info"></i> Data Reklame Resmi
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>No Pengawasan</th>
                        <th>Tanggal</th>
                        <th>NPWPD</th>
                        <th>Nama Wajib Pajak</th>
                        <th>Lokasi Reklame</th>
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
                        <td><?= $data->npwpd?></td>
                        <td><?= $data->nama_wp?></td>
                        <td><?= $data->lokasi?></td>
                        <td class="text-center">
                            <a id="set_dtl" class="btn btn-default btn-sm" 
                                data-toggle="modal" 
                                data-target="#modal-detail"
                                data-no_pws="<?=$data->no_pws?>"
                                data-tgl_pws="<?=indo_date($data->tgl_pws)?>"
                                data-npwpd="<?=$data->npwpd?>"
                                data-nama_wp="<?=$data->nama_wp?>"
                                data-alamat="<?=$data->alamat?>"
                                data-no_telp="<?=$data->no_telp?>"
                                data-izin="<?=$data->izin?>"
                                data-masa="<?=$data->masa?>"
                                data-tgl_bayar="<?=indo_date($data->tgl_bayar)?>"
                                data-jenis="<?=$data->jenis?>"
                                data-ukuran="<?=$data->ukuran?>"
                                data-teks="<?=$data->teks?>"
                                data-lokasi="<?=$data->lokasi?>"
                                data-status_tempat="<?=$data->status_tempat?>"
                                data-status_pasang="<?=$data->status_pasang?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?= site_url('pws_reklame/edit/'.$data->no_pws)?>" class="btn bg-teal btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a> 
                            <a href="<?= site_url('pws_reklame/del/'.$data->no_pws)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                            <?php if ($this->uri->segment(2)!='tidak_izin' && $this->uri->segment(2)!='tidak_bayar') { ?>
                            <a href="<?= site_url('pws_reklame/surat/'.$data->no_pws)?>" target="blank" class="btn bg-green btn-sm">
                                <i class="fa fa-print"></i>
                            </a>  
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="box-body">
            <?php if ($this->uri->segment(2)!='tidak_izin' && $this->uri->segment(2)!='tidak_bayar') { ?>
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
                            <button type="submit" name="cetak" class="btn btn-success btn-normal" formtarget="_blank">CETAK SEMUA REKAP REKLAME</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
            <div class="pull-right">
            <?php if ($this->uri->segment(2)=='tidak_izin') { ?>
                <a href="<?= site_url('pws_reklame/cetak_t_izin')?>" target="blank" class="btn bg-green btn-flat">
                    <i class="fa fa-print"></i> CETAK REKAP REKLAME TIDAK RESMI
                </a>
            <?php } else if ($this->uri->segment(2)=='tidak_bayar') { ?>
                <a href="<?= site_url('pws_reklame/cetak_t_bayar')?>" target="blank" class="btn bg-green btn-flat">
                    <i class="fa fa-print"></i> CETAK REKAP REKLAME TIDAK BAYAR
                </a>
            <?php } else { ?>
                <a href="<?= site_url('pws_reklame/cetak')?>" target="blank" class="btn bg-green btn-flat">
                    <i class="fa fa-print"></i> CETAK REKAP REKLAME RESMI
                </a>
            <?php } ?>
            </div>
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
                <h3 class="modal-title">Detail Data Pengawasan Pajak</h3>
                <span><b> No : <?= $data->no_pws?> </b></span>
                <br>
                <span> Tanggal : <?= indo_date($data->tgl_pws)?> </span>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>NPWPD</th>
                            <td><span id="npwpd"></span></td>
                        </tr>
                        <tr>
                            <th>Nama Wajib Pajak</th>
                            <td><span id="nama_wp"></span></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><span id="alamat"></span></td>
                        </tr>
                        <tr>
                            <th>No. Telepon</th>
                            <td><span id="no_telp"></span></td>
                        </tr>
                        <tr>
                            <th>Izin</th>
                            <td><span id="izin"></span></td>
                        </tr>
                        <tr>
                            <th>Masa</th>
                            <td><span id="masa"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal Bayar</th>
                            <td><span id="tgl_bayar"></span></td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td><span id="jenis"></span></td>
                        </tr>
                        <tr>
                            <th>Ukuran</th>
                            <td><span id="ukuran"></span></td>
                        </tr>
                        <tr>
                            <th>Teks/Gambar</th>
                            <td><span id="teks"></span></td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td><span id="lokasi"></span></td>
                        </tr>
                        <tr>
                            <th>Status Tempat</th>
                            <td><span id="status_tempat"></span></td>
                        </tr>
                        <tr>
                            <th>Status Pemasangan</th>
                            <td><span id="status_pasang"></span></td>
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
        var npwpd = $(this).data('npwpd');
        var nama_wp = $(this).data('nama_wp');
        var alamat = $(this).data('alamat');
        var no_telp = $(this).data('no_telp');
        var izin = $(this).data('izin');
        var masa = $(this).data('masa');
        var tgl_bayar = $(this).data('tgl_bayar');
        var jenis = $(this).data('jenis');
        var ukuran = $(this).data('ukuran');
        var teks = $(this).data('teks');
        var lokasi = $(this).data('lokasi');
        var status_tempat = $(this).data('status_tempat');
        var status_pasang = $(this).data('status_pasang');
        //menampilkan data pada modal
        $('#npwpd').text(npwpd);
        $('#nama_wp').text(nama_wp);
        $('#alamat').text(alamat);
        $('#no_telp').text(no_telp);
        $('#izin').text(izin);
        $('#masa').text(masa);
        $('#tgl_bayar').text(tgl_bayar);
        $('#jenis').text(jenis);
        $('#ukuran').text(ukuran);
        $('#teks').text(teks);
        $('#lokasi').text(lokasi);
        $('#status_tempat').text(status_tempat);
        $('#status_pasang').text(status_pasang);
    })
})
</script>