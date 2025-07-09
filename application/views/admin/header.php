<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/3/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>DM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Administrasi</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>assets/3/dist/img/amni1.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>assets/3/dist/img/amni1.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama'); ?> - Umum
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'admin/logout'; ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/3/dist/img/amni1.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="active"><a href="<?php echo base_url() ?>admin/akun"><i class="fa fa-search"></i>Akun</a></li>
        <li class="active"><a href="<?php echo base_url() ?>admin/export"><i class="fa fa-search"></i>Cek Tracer</a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Job Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url() ?>admin/jobinfo"><i class="fa fa-book"></i>Job Info</a></li>
            <li class="active"><a href="<?php echo base_url() ?>admin/tambahjobinfo"><i class="fa fa-pencil"></i>Tambah Job Info</a></li>

            <!-- <li><a href="index2.html"><i class="fa fa-paperclip"></i>Rekap</a></li> -->
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url() ?>admin/berita"><i class="fa fa-book"></i>Berita</a></li>
            <li class="active"><a href="<?php echo base_url() ?>admin/tambahberita"><i class="fa fa-pencil"></i>Tambah Berita</a></li>

            <!-- <li><a href="index2.html"><i class="fa fa-paperclip"></i>Rekap</a></li> -->
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-paperclip"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url() ?>admin_report/report_khorizontal"><i class="fa fa-book"></i>Keselarasan Horizontal</a></li>
            <li class="active"><a href="<?php echo base_url() ?>admin_report/report_kvertikal"><i class="fa fa-book"></i>Keselarasan Vertikal</a></li>
            <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Kompetensi
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() ?>admin_report/report_k_e"><i class="fa fa-circle-o"></i> Etika</a></li>
                    <li><a href="<?php echo base_url() ?>admin_report/report_k_bi"><i class="fa fa-circle-o"></i> Bidang Ilmu</a></li>
                    <li><a href="<?php echo base_url() ?>admin_report/report_k_bing"><i class="fa fa-circle-o"></i> Bahasa Inggris</a></li>
                    <li><a href="<?php echo base_url() ?>admin_report/report_k_tek"><i class="fa fa-circle-o"></i> Teknologi Informasi</a></li>
                    <li><a href="<?php echo base_url() ?>admin_report/report_k_kom"><i class="fa fa-circle-o"></i> Komunikasi</a></li>
                    <li><a href="<?php echo base_url() ?>admin_report/report_k_ks"><i class="fa fa-circle-o"></i> Kerja Sama</a></li>
                    <li><a href="<?php echo base_url() ?>admin_report/report_k_pd"><i class="fa fa-circle-o"></i> Pengembangan Diri</a></li>
                  </ul>
                </li>
             <li class="active"><a href="<?php echo base_url() ?>admin_report/report_lamatunggu"><i class="fa fa-book"></i>Lama Tunggu</a></li>
            <li class="active"><a href="<?php echo base_url() ?>admin_report/report_stakeholder"><i class="fa fa-book"></i>Pengguna Lulusan</a></li>

            <!-- <li><a href="index2.html"><i class="fa fa-paperclip"></i>Rekap</a></li> -->
          </ul>
        </li>
         <!-- <li class="active"><a href="<?php //echo base_url() ?>admin/export"><i class="fa fa-file-excel"></i>Export Excel</a></li> -->
          <li class="active"><a href="<?php echo base_url() ?>admin/export2021"><i class="fa fa-file-excel"></i>Export Excel</a></li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat Datang
        <small>Di Sistem Informasi Administrasi Pusat Karir UNIMAR AMNI Semarang</small>
      </h1>

    </section>

 
