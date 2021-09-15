<section class="content-header">
  <h1>
    Pemeriksaan
    <b>Hiburan</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Pemeriksaan</li>
    <li class="active">Hiburan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pemeriksaan Pajak Hiburan</h3>
            <div class="pull-right">
                <a href="<?= site_url('prs_hiburan/add')?>" class="btn bg-teal btn-flat">
                    <i class="fa fa-user-plus"></i> Add
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <?php $this->view('pesan')?>
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>No Pengawasan</th>
                        <th>Tanggal</th>
                        <th>NPWPD</th>
                        <th>Nama Wajib Pajak</th>
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
                        <td class="text-center">
                            <a href="<?= site_url('prs_hiburan/cek/'.$data->no_pws)?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i> LIHAT
                            </a> 
                            <a href="<?= site_url('prs_hiburan/del/'.$data->no_pws)?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> HAPUS DATA
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