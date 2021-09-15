<section class="content-header">
  <h1>
    Pemeriksaan
    <b><?=ucfirst($dt->ket_tipe)?></b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">wp_data</li>
    <li class="active">Pemeriksaan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pemeriksaan Pajak <?=ucfirst($dt->ket_tipe)?></h3>
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
                            <a href="<?= site_url('wp_data/data_pemeriksaan/'.$data->no_pws)?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i> LIHAT
                            </a> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>