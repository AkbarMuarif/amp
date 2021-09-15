<section class="content-header">
  <h1>
    Wajib Pajak
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Wp</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Wajib Pajak Daerah</h3>
            <div class="pull-right">
                <a href="<?= site_url('wp/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Add
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>NPWPD</th>
                        <th>Nama Wajib Pajak</th>
                        <th>Jenis</th>
                        <th>Nama Pengelola</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Username</th>
                        <th class="text-center" width="100px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; 
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $data->npwpd?></td>
                        <td><?= $data->nama_wp?></td>
                        <td><?= ucwords($data->jenis_tipe)?></td>
                        <td><?= $data->nama_kelola?></td>
                        <td><?= $data->alamat?></td>
                        <td><?= $data->no_telp?></td>
                        <td><?= $data->username?></td>
                        <td class="text-center">
                            <!-- metode get -->
                            <a href="<?= site_url('wp/edit/'.$data->npwpd)?>" class="btn bg-green btn-xs">
                                <i class="fa fa-pencil"></i> Ubah
                            </a> 
                            <a href="<?= site_url('wp/del/'.$data->npwpd)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Hapus
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
                        <label for="tipenya">Jenis Wajib Pajak</label>
                        <select name="tipenya" class="form-control" id="tipenya">
                            <option value="">- Pilih -</option>
                            <option value="hotel" <?=set_value('tipenya') == "hotel" ? "selected" : null?>> Hotel </option>
                            <option value="hiburan" <?=set_value('tipenya') == "hiburan" ? "selected" : null?>> Hiburan </option>
                            <option value="restoran" <?=set_value('tipenya') == "restoran" ? "selected" : null?>> Restoran </option>
                        </select>
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