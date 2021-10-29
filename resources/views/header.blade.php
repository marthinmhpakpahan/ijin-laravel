<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{URL::asset('/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
      {{$title}}
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{URL::asset('/assets/css/material-dashboard.css')}}" rel="stylesheet" />

  <!-- <link href="{{URL::asset('/assets/css/bootstrap.css')}}" rel="stylesheet" /> -->
  <?php if($page == "calendar") { ?>
  <link href="{{URL::asset('/assets/css/calendar.css')}}" rel="stylesheet" />
    <?php } ?>
  <!-- <script src="{{URL::asset('/assets/js/jquery-1.10.2.js')}}" type="text/javascript"></script> -->
	<!-- <script src="{{URL::asset('/assets/js/bootstrap.js')}}" type="text/javascript"></script> -->
	<script src="{{URL::asset('/assets/js/login-register.js')}}" type="text/javascript"></script>
</head>

<body class="">
    <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          MEETREQ SYSTEM
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <?php if(isset($_COOKIE['role']) && $_COOKIE['role'] == "admin") { ?>
          <li class="nav-item <?php echo ($page == "dashboard") ? 'active' : ''; ?>">
            <a class="nav-link" href="/dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <?php } ?>
          <?php if(isset($_COOKIE['role']) && $_COOKIE['role'] == "admin") { ?>
          <li class="nav-item <?php echo ($page == "dosen") ? 'active' : ''; ?>">
            <a class="nav-link" href="/dosen">
              <i class="material-icons">person</i>
              <p>Data Dosen</p>
            </a>
          </li>
          <?php } ?>
          <?php if(isset($_COOKIE['role']) && $_COOKIE['role'] == "admin") { ?>
          <li class="nav-item <?php echo ($page == "mahasiswa") ? 'active' : ''; ?>">
            <a class="nav-link" href="/mahasiswa">
              <i class="material-icons">content_paste</i>
              <p>Data Mahasiswa</p>
            </a>
          </li>
          <?php } ?>
          <?php if(isset($_COOKIE['user_id'])) { ?>
          <li class="nav-item <?php echo ($page == "request") ? 'active' : ''; ?>">
            <a class="nav-link" href="/request">
              <i class="material-icons">library_books</i>
              <p>Daftar Request</p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-item <?php echo ($page == "calendar") ? 'active' : ''; ?>">
            <a class="nav-link" href="/">
              <i class="material-icons">location_ons</i>
              <p>Kalender</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><b>{{$title}}</b></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <?php if(!isset($_COOKIE['user_id'])) { ?>
                    <a class="btn btn-info" id="dashboard-login-btn" style="color: #ffffff;"><i class="material-icons">person</i> Login</a>
                <?php } else { ?>
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <p class="d-lg d-md-block">
                        Selamat datang, <b><?= $_COOKIE['username']; ?></b> <i class="material-icons">person</i>
                      </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                      <a class="dropdown-item" href="#">Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Log out</a>
                    </div>
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
      <!-- End Navbar -->
