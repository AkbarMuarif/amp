<section class="content-header">
  <h1>
    Wajib Pajak
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Wp</li>
    <li class="active">Edit</li>
  </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><b>Edit Data</b></h3>
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
                <?php echo form_open_multipart(current_url()) ?>
                    <div class="form-group">
                        <label for="npwpd">NPWPD</label>
                        <input type="text" name="npwpd" id="npwpd" value="<?=$this->input->post('npwpd') ?? $row->npwpd?>" class="form-control" readonly>
                    </div>
                    <div class="form-group <?=form_error('nama_wp')? 'has-error' : null?>">
                        <label for="nama_wp">Nama Wajib Pajak *</label>
                        <input type="text" name="nama_wp" id="nama_wp" value="<?=$this->input->post('nama_wp') ?? $row->nama_wp?>" class="form-control" maxlength="100">
                        <?=form_error('nama_wp')?>
                    </div>
                    <div class="form-group">
                        <label>Jenis Wajib Pajak *</label>
                        <?php echo form_dropdown('tipe', $tipe, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>
                    <div class="form-group <?=form_error('nama_kelola')? 'has-error' : null?>">
                        <label for="nama_kelola">Nama Pengelola *</label>
                        <input type="text" name="nama_kelola" id="nama_kelola" value="<?=$this->input->post('nama_kelola') ?? $row->nama_kelola?>" class="form-control" maxlength="100">
                        <?=form_error('nama_kelola')?>
                    </div>
                    <div class="form-group <?=form_error('alamat')? 'has-error' : null?>">
                        <label for="alamat">Alamat *</label>
                        <input type="text" name="alamat" id="alamat" value="<?=$this->input->post('alamat') ?? $row->alamat?>" class="form-control" maxlength="200">
                        <?=form_error('alamat')?>
                    </div>
                    <div class="form-group <?=form_error('no_telp')? 'has-error' : null?>">
                        <label for="no_telp">Nomor Telepon *</label>
                        <input type="text" name="no_telp" id="no_telp" value="<?=$this->input->post('no_telp') ?? $row->no_telp?>" class="form-control" maxlength="15">
                        <?=form_error('no_telp')?>
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