<section class="content-header">
  <h1>
    Pengguna
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">User</li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Pengguna</h3>
            <div class="pull-right">
                <a href="<?= site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <?php // echo validation_errors(); ?>
                <!-- <form action="" method="post" class="form-horizontal"> -->
                <?php echo form_open_multipart('user/create') ?>
                    <div class="form-group">
                        <label for="npwpd" class="col-sm-4 control-label">NPWPD &nbsp;</label>
                        <div class="form-group input-group col-sm-8">
                            <input type="text" name="npwpd" id="npwpd" class="form-control" value="<?=set_value('npwpd')?>" readonly>
                            <span class="input-group-btn">
                                <button id="modals" type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('fullname')? 'has-error' : null?>">
                        <label for="name" class="col-sm-4 control-label">Name *</label>
                        <div class="form-group input-group col-sm-8">
                            <input type="text" name="fullname" id="name" value="<?=set_value('fullname')?>" class="form-control">
                            <?=form_error('fullname')?>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('username')? 'has-error' : null?>">
                        <label for="username" class="col-sm-4 control-label">Username *</label>
                        <div class="form-group input-group col-sm-8">
                            <input type="text" name="username" id="username" value="<?=set_value('username')?>" class="form-control">
                            <?=form_error('username')?>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('password')? 'has-error' : null?>">
                        <label for="password" class="col-sm-4 control-label">Password *</label>
                        <div class="form-group input-group col-sm-8">
                            <input type="password" name="password" id="password" value="<?=set_value('password')?>" class="form-control">
                            <?=form_error('password')?>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('passconf')? 'has-error' : null?>">
                        <label for="passconf" class="col-sm-4 control-label">Password Confirmation *</label>
                        <div class="form-group input-group col-sm-8">
                            <input type="password" name="passconf" id="passconf" value="<?=set_value('passconf')?>" class="form-control">
                            <?=form_error('passconf')?>
                        </div>
                    </div>
                    <div class="form-group <?=form_error('level')? 'has-error' : null?>">
                        <label for="level" class="col-sm-4 control-label">Level *</label>
                        <div class="form-group input-group col-sm-8">
                            <select name="level" class="form-control" id="level">
                                <option value="">- Pilih -</option>
                                <option value="1" <?=set_value('level') == '1' ? "selected" : null?>>Admin</option>
                                <option value="2" <?=set_value('level') == '2' ? "selected" : null?>>Wajib Pajak</option>
                            </select>
                            <?=form_error('level')?>
                        </div>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="btn btn-success btn-flat margin pull-right">
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
                <h4 class="modal-title">Daftar Wajib Pajak</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>NPWPD</th>
                            <th>Nama Wajib Pajak</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($wp as $x => $data) { ?>
                        <tr>
                            <td><?=$data->npwpd?></td>
                            <td><?=$data->nama_wp?></td>
                            <td><?=$data->alamat?></td>
                            <td><?=$data->no_telp?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" id="mod" 
                                data-npwpd="<?=$data->npwpd?>"
                                data-nama_wp="<?=$data->nama_wp?>"
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
        var npwpd = $(this).data('npwpd');
        var nama_wp = $(this).data('nama_wp');
        $('#npwpd').val(npwpd);
        $('#name').val(nama_wp);
        $('#name').attr('readonly','true');
        $('#modal-item').modal('hide');
    })
    $("#level").change(function() {
        var level = $("#level").val();
        if (level == "1") {
            $('#name').removeAttr('readonly');
            $('#npwpd').val(null);
            $("#modals").hide();
        } else {
            $("#modals").show();
        }
    })
})
</script>