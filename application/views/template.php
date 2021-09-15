<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Monitoring Pajak Daerah</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini 
  <?= $this->uri->segment(1)=='pws_hotel' && $this->uri->segment(2)==null || 
      $this->uri->segment(1)=='pws_reklame' && $this->uri->segment(2)==null ||
      $this->uri->segment(1)=='pws_restoran' && $this->uri->segment(2)==null ||
      $this->uri->segment(1)=='pws_hiburan' && $this->uri->segment(2)==null ||
      $this->uri->segment(1)=='pws_insidentil' && $this->uri->segment(2)==null ||
      $this->uri->segment(1)=='prs_hotel' && $this->uri->segment(2)=='cek'||
      $this->uri->segment(1)=='prs_restoran' && $this->uri->segment(2)=='cek'||
      $this->uri->segment(1)=='prs_hiburan' && $this->uri->segment(2)=='cek'
      ?'sidebar-collapse' : null?>">

<div class="wrapper">
  <!-- =============================================== -->
  <header class="main-header">
    <a href="<?=base_url()?>" class="logo">
      <span class="logo-mini"><b>MP</b></span>
      <span class="logo-lg">Monitoring <b>Pajak</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- =============================================== -->

  <!-- =============================================== -->
  <?php if($this->fungsi->user_login()->level == 1) { ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>uploads/dinas.png" class="light-logo" alt="logo" width="50%">
        </div>
        <div class="pull-left info">
          <p align="center">BAKEUDA</p>
          <b>Badan Keuangan Daerah</b>
        </div>
      </div>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MONITORING</li>
        <li>
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li class="treeview <?=$this->uri->segment(1) == 'wp' || $this->uri->segment(1) == 'tipe_wp' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Wajib Pajak</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'wp' ? 'class="active"' : '' ?>><a href="<?=site_url('wp')?>"><i class="fa fa-dot-circle-o"></i> Data Wajib Pajak</a></li>
            <li <?=$this->uri->segment(1) == 'tipe_wp' ? 'class="active"' : '' ?>><a href="<?=site_url('tipe_wp')?>"><i class="fa fa-dot-circle-o"></i> Jenis Wajib Pajak</a></li>
          </ul>
        </li>
        <li class="treeview <?=$this->uri->segment(1) == 'pws_hotel' || $this->uri->segment(1) == 'pws_hiburan' || $this->uri->segment(1) == 'pws_restoran' || $this->uri->segment(1) == 'pws_reklame' || $this->uri->segment(1) == 'pws_insidentil' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-search"></i> <span>Pengawasan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'pws_hotel' ? 'class="active"' : '' ?>><a href="<?=site_url('pws_hotel')?>"><i class="fa fa-dot-circle-o"></i> Pajak Hotel</a></li>
            <li <?=$this->uri->segment(1) == 'pws_hiburan' ? 'class="active"' : '' ?>><a href="<?=site_url('pws_hiburan')?>"><i class="fa fa-dot-circle-o"></i> Pajak Hiburan</a></li>
            <li <?=$this->uri->segment(1) == 'pws_restoran' ? 'class="active"' : '' ?>><a href="<?=site_url('pws_restoran')?>"><i class="fa fa-dot-circle-o"></i> Pajak Restoran</a></li>
            <li <?=$this->uri->segment(1) == 'pws_reklame' ? 'class="active"' : '' ?>><a href="<?=site_url('pws_reklame')?>"><i class="fa fa-dot-circle-o"></i> Pajak Reklame</a></li>
            <li <?=$this->uri->segment(1) == 'pws_insidentil' ? 'class="active"' : '' ?>><a href="<?=site_url('pws_insidentil')?>"><i class="fa fa-dot-circle-o"></i> Pajak Insidentil</a></li>
          </ul>
        </li>
        <li class="treeview <?=$this->uri->segment(1) == 'prs_hotel' || $this->uri->segment(1) == 'prs_hiburan' || $this->uri->segment(1) == 'prs_restoran' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-pencil-square-o"></i> <span>Pemeriksaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(1) == 'prs_hotel' ? 'class="active"' : '' ?>><a href="<?=site_url('prs_hotel')?>"><i class="fa fa-dot-circle-o"></i> Pajak Hotel</a></li>
            <li <?=$this->uri->segment(1) == 'prs_hiburan' ? 'class="active"' : '' ?>><a href="<?=site_url('prs_hiburan')?>"><i class="fa fa-dot-circle-o"></i> Pajak Hiburan</a></li>
            <li <?=$this->uri->segment(1) == 'prs_restoran' ? 'class="active"' : '' ?>><a href="<?=site_url('prs_restoran')?>"><i class="fa fa-dot-circle-o"></i> Pajak Restoran</a></li>
          </ul>
        </li>
        <li class="header"><?=strtoupper($this->fungsi->user_login()->username) ?></li>
        <li>
          <a href="<?=site_url('profile')?>">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li>
        <li>
          <a href="<?=site_url('login/keluar')?>">
            <i class="fa fa-power-off"></i> <span>Logout</span>
          </a>
        </li>
        <li class="header">PENGATURAN</li>
        <li>
          <a href="<?=site_url('user')?>">
            <i class="fa fa-user-plus"></i> <span>Pengguna</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>
  <!-- =============================================== -->
  <?php } else { ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>uploads/dinas.png" class="light-logo" alt="logo" width="50%">
        </div>
        <div class="pull-left info">
          <p align="center">BAKEUDA</p>
          <b>Badan Keuangan Daerah</b>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PENGAWASAN PAJAK</li>
        <li>
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li>
          <a href="<?=site_url('profile')?>">
            <i class="fa fa-user"></i>
            <span><?=ucfirst($this->fungsi->user_login()->username)?></span>
          </a>
        </li>
        <li>
          <a href="<?=site_url('wp_lapor')?>">
            <i class="fa fa-pencil-square-o"></i> <span>Lapor Pengawasan Pajak</span>
          </a>
        </li>
        <li class="treeview <?=$this->uri->segment(1) == 'wp_data' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-search"></i> <span>Lihat Pajak</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?=$this->uri->segment(2) == 'pengawasan' ? 'class="active"' : '' ?>><a href="<?=site_url('wp_data/pengawasan')?>"><i class="fa fa-dot-circle-o"></i>Pengawasan Pajak</a></li>
            <li <?=$this->uri->segment(2) == 'pemeriksaan' ? 'class="active"' : '' ?>><a href="<?=site_url('wp_data/pemeriksaan')?>"><i class="fa fa-dot-circle-o"></i>Pemeriksaan Pajak</a></li>
          </ul>
        </li>
        <li>
          <a href="<?=site_url('login/keluar')?>">
            <i class="fa fa-power-off"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>
  <?php } ?>

  <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- =============================================== -->
  <div class="content-wrapper">
    <?=$contents?>
  </div>
  <!-- =============================================== -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="#">Akbar Mu'arif</a>.</strong> All rights
    reserved.
  </footer>
</div>

<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table1').DataTable()
  })
</script>
</body>

</html>