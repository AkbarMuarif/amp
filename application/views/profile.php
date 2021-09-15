<section class="content-header">
  <h1>
    Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
    <li class="active">Profile</li>
  </ol>
</section>

<section class="content">
    <div class="box box-solid">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Profile</a></li>
                <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Settings</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="profile">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <br>
                            <h3 class="profile-username text-center"><?=ucfirst($row->name)?></h3>
                            <?php if ($log->npwpd != null) {?>
                                <p class="text-muted text-center"><?=ucfirst($dt->jenis_tipe)?></p>
                            <?php } else { 
                                if ($row->level == '1') {     
                            ?>   
                                <p class="text-muted text-center">Admin</p>
                            <?php } else { ?>
                                <p class="text-muted text-center">Pengguna</p>
                            <?php
                                }
                            } ?>
                            <br>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Username</b> <p class="pull-right"><?=$row->username?></a>
                                </li>
                                <?php if ($log->npwpd != null) {?>
                                    <li class="list-group-item">
                                        <b>Nama Pengelola</b> <p class="pull-right"><?=ucfirst($dt->nama_kelola)?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Alamat</b> <p class="pull-right"><?=ucfirst($dt->alamat)?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No. Telepon</b> <p class="pull-right"><?=$dt->no_telp?></a>
                                    </li>
                                <?php } else if ($log->npwpd == null && $log->level == '1') { ?>
                                    <li class="list-group-item">
                                        <b>Instansi</b> <p class="pull-right">Badan Keuangan Daerah Kota Banjarmasin</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Alamat</b> <p class="pull-right">Jalan Pramuka Tirtha Dharma Komplek PDAM Bandarmasih No.17 RT 9 Banjarmasin</a>
                                    </li>
                                <?php } else { ?>
                                    <li class="list-group-item">
                                        <b>Keterangan</b> <p class="pull-right">Pengguna Tambahan</a>
                                    </li>
                                <?php } ?> 
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="settings">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <div class="form-group <?=form_error('username')? 'has-error' : null?>">
                                    <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                                    <input type="hidden" name="npwpd" value="<?=$row->npwpd?>">
                                    <label>Username *</label>
                                    <input type="text" name="username" value="<?=$this->input->post('username') ? $this->input->post('username') : $row->username?>" class="form-control">
                                    <?=form_error('username')?>
                                </div>
                                <div class="form-group <?=form_error('password')? 'has-error' : null?>">
                                    <label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                                    <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                                    <?=form_error('password')?>
                                </div>
                                <div class="form-group <?=form_error('passconf')? 'has-error' : null?>">
                                    <label>Password Confirmation</label>
                                    <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                                    <?=form_error('passconf')?>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>