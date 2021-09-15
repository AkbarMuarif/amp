<section class="content-header">
  <h1>
    Pengguna
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pengguna</h3>
            <div class="pull-right">
                <a href="<?=site_url('user/create')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Add
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th style="width: 150px" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; 
                    foreach($user->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $data->username?></td>
                        <td><?= $data->name?></td>
                        <td><?= $data->level == 1 ? "Admin" : "Wajib Pajak" ?></td>
                        <td class="text-center">
                        <?php if ($data->npwpd != null) { ?>
                            <form action="<?= site_url('user/delwp')?>" method="post">
                            <input type="hidden" name="npwpd" value="<?=$data->npwpd?>">
                        <?php } else if ($data->npwpd = null) {?>
                            <form action="<?= site_url('user/del')?>" method="post">
                        <?php } ?>
                            <?php if ($data->level == 2 ) { ?>
                            <a href="<?= site_url('user/edit/'.$data->user_id)?>" class="btn bg-olive btn-xs">
                                <i class="fa fa-pencil" style="width : 20px"></i> Ubah
                            </a> 
                            <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                            <button onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn bg-red btn-xs">
                                <i class="fa fa-trash" style="width : 20px"></i> Hapus
                            </button>
                            <?php } ?>
                        </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>