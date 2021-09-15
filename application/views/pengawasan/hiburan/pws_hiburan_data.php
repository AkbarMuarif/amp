<section class="content-header">
  <h1>
    Pengawasan
    <b>hiburan</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pengawasan</li>
    <li class="active">hiburan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pengawasan Pajak hiburan</h3>
            <div class="pull-right">
                <a href="<?= site_url('pws_hiburan/add')?>" class="btn btn-primary btn-flat">
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
                        <th>NPWPD</th>
                        <th>Nama Wajib Pajak</th>
                        <th class="text-center">SSPD</th>
                        <th class="text-center">SPTPD</th>
                        <th class="text-center" width="150px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; 
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td>
                            <?= $data->no_pws;
                            if ($data->verif == 'T') {
                            ?>
                                <p style="color:red">Belum Diverifikasi</p>
                            <?php } ?>
                        </td>
                        <td><?= indo_date($data->tgl_pws)?></td>
                        <td><?= $data->npwpd?></td>
                        <td><?= $data->nama_wp?></td>
                        <?php if ($data->sspd != null) { ?>
                            <td class="text-center">
                                <a href="<?= 'uploads/pengawasan/hiburan/'.$data->sspd?>" class="btn bg-olive btn-flat">SSPD</a>
                            </td>
                        <?php } else { ?>
                            <td class="text-center">
                                <a href="#" class="btn btn-default btn-flat">SSPD</a>
                            </td>
                        <?php } ?>
                        <?php if ($data->sptpd != null) { ?>
                            <td class="text-center">
                                <a href="<?= 'uploads/pengawasan/hiburan/'.$data->sptpd?>" class="btn bg-olive btn-flat">SPTPD</a>
                            </td>
                        <?php } else { ?>
                            <td class="text-center">
                                <a href="#" class="btn btn-default btn-flat">SPTPD</a>
                            </td>
                        <?php } ?>
                        <td class="text-center">
                            <a id="set_dtl" class="btn btn-default btn-sm" 
                                data-toggle="modal" 
                                data-target="#modal-detail"
                                data-no_pws="<?=$data->no_pws?>"
                                data-tgl_pws="<?=indo_date($data->tgl_pws)?>"
                                data-npwpd="<?=$data->npwpd?>"
                                data-pajak="<?=$data->pajak?>"
                                data-nama_wp="<?=strtoupper($data->nama_wp)?>"
                                data-alamat="<?=ucfirst($data->alamat)?>"
                                data-no_telp="<?=$data->no_telp?>"
                                data-izin="<?=strtoupper($data->izin)?>"
                                data-tarif="<?=strtoupper($data->tarif)?>"
                                data-sptpd="<?=$data->sptpd?>"
                                data-rekap_terima="<?=strtoupper($data->rekap_terima)?>"
                                data-rekap_bill="<?=strtoupper($data->rekap_bill)?>"
                                data-sspd="<?=$data->sspd?>"
                                data-bill="<?=strtoupper($data->bill)?>"
                                data-cash="<?=strtoupper($data->cash)?>"
                                data-edc="<?=strtoupper($data->edc)?>"
                                data-emoney="<?=strtoupper($data->emoney)?>"
                                data-tgl_bayar="<?=indo_date($data->tgl_bayar)?>"
                                data-ket="<?=$data->ket?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?= site_url('pws_hiburan/edit/'.$data->no_pws)?>" class="btn btn-info btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a> 
                            <a href="<?= site_url('pws_hiburan/del/'.$data->no_pws)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a> 
                            <?php if ($data->verif == 'Y') { ?> 
                                <a href="<?= site_url('pws_hiburan/surat/'.$data->no_pws)?>" target="blank" class="btn bg-green btn-sm">
                                    <i class="fa fa-print"></i>
                                </a> 
                            <?php } else if ($data->verif == 'T') {  ?> 
                                <a href="<?= site_url('pws_hiburan/verif/'.$data->no_pws)?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-check"></i>
                                </a>
                            <?php } ?>
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
                            <td colspan="2" align="center"><b>DATA WAJIB PAJAK</b></td>
                        </tr>
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
                            <td colspan="2" align="center"><b>PENGAWASAN</b></td>
                        </tr>
                        <tr>
                            <th>Izin</th>
                            <td><span id="izin"></span></td>
                        </tr>
                        <tr>
                            <th>
                                Tarif Pajak 
                                <span id="pajak"></span>
                                %
                            </th>
                            <td><span id="tarif"></span></td>
                        </tr>
                        <tr>
                            <th>SPTPD</th>
                            <td><span id="sptpd"></span></td>

                        </tr>
                        <tr>
                            <th>Rekap Penerimaan Bulanan</th>
                            <td><span id="rekap_terima"></span></td>
                        </tr>
                        <tr>
                            <th>Rekap Penggunaan Bill Penjualan</th>
                            <td><span id="rekap_bill"></span></td>
                        </tr>
                        <tr>
                            <th>SSPD</th>
                            <td><span id="sspd"></span></td>
                        </tr>
                        <tr>
                            <th>Bill/Bon Penjualan</th>
                            <td><span id="bill"></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><b>JENIS PEMBAYARAN</b></td>
                        </tr>
                        <tr>
                            <th>Uang Kontan (Cash)</th>
                            <td><span id="cash"></span></td> 
                        </tr>
                        <tr>
                            <th>Kartu Debit/Kredit (EDC)</th>
                            <td><span id="edc"></span></td> 
                        </tr>
                        <tr>
                            <th>E-Money (OVO, GoPay, dan sejenisnya)</th>
                            <td><span id="emoney"></span></td> 
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
        var nama_wp = $(this).data('nama_wp');
        var alamat = $(this).data('alamat');
        var no_telp = $(this).data('no_telp');
        var izin = $(this).data('izin');
        var pajak = $(this).data('pajak');
        var tarif = $(this).data('tarif');
        if($(this).data('sptpd')==''){
            var sptpd = 'TIDAK ADA';
        } else {
            var sptpd = 'ADA';
        }
        var rekap_terima = $(this).data('rekap_terima');
        var rekap_bill = $(this).data('rekap_bill');
        if($(this).data('sspd')==''){
            var sspd = 'TIDAK ADA';
        } else {
            var sspd = 'ADA';
        }
        var rekap_terima = $(this).data('rekap_terima');
        var rekap_bill = $(this).data('rekap_bill');
        var bill = $(this).data('bill');
        var cash = $(this).data('cash');
        var edc = $(this).data('edc');
        var emoney = $(this).data('emoney');
        var tgl_bayar = $(this).data('tgl_bayar');
        var ket = $(this).data('ket');
        //menampilkan data pada modal'
        $('#no_pws').text(no_pws);
        $('#tgl_pws').text(tgl_pws);
        $('#npwpd').text(npwpd);
        $('#nama_wp').text(nama_wp);
        $('#alamat').text(alamat);
        $('#no_telp').text(no_telp);
        $('#izin').text(izin);
        $('#pajak').text(pajak);
        $('#tarif').text(tarif);
        $('#sptpd').text(sptpd);
        $('#rekap_terima').text(rekap_terima);
        $('#rekap_bill').text(rekap_bill);
        $('#sspd').text(sspd);
        $('#bill').text(bill);
        $('#cash').text(cash);
        $('#edc').text(edc);
        $('#emoney').text(emoney);
        $('#tgl_bayar').text(tgl_bayar);
        $('#ket').text(ket);
        // =========================
        
    })
})
</script>