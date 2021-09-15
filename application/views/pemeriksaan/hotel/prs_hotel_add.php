<section class="content-header">
  <h1>
    Pemeriksaan
    <b>Hotel</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pemeriksaan</li>
    <li class="active">Hotel</li>
    <li class="active">Add</li>
  </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Pemeriksaan</h3>
            <div class="pull-right">
                <a href="<?= site_url('prs_hotel')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="no_pws">Nomor Pengawasan yang Diperiksa</label>
                        <div class="form-group input-group">
                            <input type="text" name="no_pws" id="no_pws" class="form-control" value="<?=set_value('no_pws')?>" required readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('nama_wp')? 'has-error' : null?>">
                        <label for="nama_wp">Nama Wajib Pajak</label>
                        <input type="text" name="nama_wp" id="nama_wp" value="<?=set_value('nama_wp')?>" class="form-control" readonly>
                        <?=form_error('nama_wp')?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipe_id" id="tipe_id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="npwpd" id="npwpd">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="pajak" id="pajak">
                    </div>
                    <div>
                        <br>
                        <h4 align="center">Hasil Pemeriksaan</h4>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th class="text-center">PERIODE</th>
                            <th class="text-center">OMSET SPTPD</th>
                            <th class="text-center">OMSET PERIKSA</th>
                        </tr>
                            <?php for($h=1;$h<=6;$h++) { ?>
                                <tr>
                                    <td>
                                    <div class="form-group" >
                                        <input type="date" name="periode<?=$h?>" id="periode<?=$h?>"  class="form-control" required>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="form-group">
                                        <input type="number" name="osptpd<?=$h?>" id="osptpd<?=$h?>" value="<?=set_value('osptpd'.$h)?>" class="form-control" required>
                                    </div>
                                    </td>
                                    <td> 
                                    <div class="form-group">
                                        <input type="number" name="oprs<?=$h?>" id="oprs<?=$h?>" value="<?=set_value('oprs'.$h)?>" class="form-control" required>
                                    </div>
                                </td>
                                </tr>
                            <?php } ?>
                    </table>
                    <!-- button -->
                    <div class="button-group">
                        <button type="submit" class="btn btn-success btn-flat margin pull-right" name="submit">
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
                <h4 class="modal-title">Daftar Pengawasan Hotel Daerah</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. Pengawasan</th>
                            <th>Tanggal Pengawasan</th>
                            <th>NPWPD</th>
                            <th>Nama Wajib Pajak</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pws as $x => $data) { ?>
                        <tr>
                            <td><?=$data->no_pws?></td>
                            <td><?=$data->tgl_pws?></td>
                            <td><?=$data->npwpd?></td>
                            <td><?=$data->nama_wp?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" id="mod" 
                                data-no_pws="<?=$data->no_pws?>"
                                data-npwpd="<?=$data->npwpd?>"
                                data-tipe_id="<?=$data->tipe_id?>"
                                data-nama_wp="<?=$data->nama_wp?>"
                                data-pajak="<?=$data->pajak?>"
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
        var no_pws = $(this).data('no_pws');
        var npwpd = $(this).data('npwpd');
        var tipe_id = $(this).data('tipe_id');
        var nama_wp = $(this).data('nama_wp');
        var pajak = $(this).data('pajak');
        $('#no_pws').val(no_pws);
        $('#nama_wp').val(nama_wp);
        $('#tipe_id').val(tipe_id);
        $('#npwpd').val(npwpd);
        $('#pajak').val(pajak);
        $('#modal-item').modal('hide');
    })
})
</script>