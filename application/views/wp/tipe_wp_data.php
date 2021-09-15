<section class="content-header">
  <h1>
    Wajib Pajak
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Tipe_wp</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Jenis-Jenis Wajib Pajak Daerah</h3>
            <div class="pull-right">
                <a href="<?= site_url('tipe_wp/add')?>" class="btn bg-teal btn-flat">
                    <i class="fa fa-user-plus"></i> Add
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Jenis Wajib Pajak</th>
                        <th>Tipe Wajib Pajak</th>
                        <th>Tarif Pajak</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; 
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?=ucwords($data->jenis_tipe)?></td>
                        <td><?=ucwords($data->ket_tipe)?></td>
                        <td><?=$data->pajak?>%</td>
                        <td class="text-center" width="160px">
                            <!-- metode get -->
                            <a href="<?= site_url('tipe_wp/edit/'.$data->tipe_id)?>" class="btn bg-green btn-xs">
                                <i class="fa fa-pencil"></i> Ubah
                            </a> 
                            <a href="<?= site_url('tipe_wp/del/'.$data->tipe_id)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Hapus
                            </a> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>