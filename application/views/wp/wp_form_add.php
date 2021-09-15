<section class="content-header">
  <h1>
    Wajib Pajak
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Wp</li>
    <li class="active">Add</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>Tambah Data</b></h3>
            <div class="pull-right">
                <a href="<?= site_url('wp')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php // echo validation_errors(); ?>
                <?php echo form_open_multipart('wp/add') ?>
                    <div class="form-group <?=form_error('npwpd')? 'has-error' : null?>">
                        <label for="npwpd">NPWPD *</label>
                        <input type="text" name="npwpd" id="npwpd" maxlength="20" class="form-control" value="<?=set_value('npwpd')?>">
                        <?=form_error('npwpd')?>
                    </div>
                    <div class="form-group <?=form_error('nama_wp')? 'has-error' : null?>">
                        <label for="nama_wp">Nama Wajib Pajak *</label>
                        <input type="text" name="nama_wp" id="nama_wp" class="form-control" value="<?=set_value('nama_wp')?>" maxlength="100">
                        <?=form_error('nama_wp')?>
                    </div>
                    <div class="form-group">
                        <label>Jenis Wajib Pajak *</label>
                        <?php echo form_dropdown('tipe', $tipe, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>
                    <div class="form-group <?=form_error('nama_kelola')? 'has-error' : null?>">
                        <label for="nama_kelola">Nama Pengelola *</label>
                        <input type="text" name="nama_kelola" id="nama_kelola" class="form-control" value="<?=set_value('nama_kelola')?>" maxlength="100">
                        <?=form_error('nama_kelola')?>
                    </div>
                    <div class="form-group <?=form_error('alamat')? 'has-error' : null?>">
                        <label for="alamat">Alamat *</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?=set_value('alamat')?>" maxlength="200">
                        <?=form_error('alamat')?>
                    </div>
                    <div class="form-group <?=form_error('no_telp')? 'has-error' : null?>">
                        <label for="no_telp">Nomor Telepon *</label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?=set_value('no_telp')?>" maxlength="15">
                        <?=form_error('no_telp')?>
                    </div>
                    <div class="form-group <?=form_error('username')? 'has-error' : null?>">
                        <label for="username">Username *</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?=set_value('username')?>" maxlength="50">
                        <?=form_error('username')?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Submit
                        </button>
                        <button type="reset" class="btn bg-red btn-flat">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>