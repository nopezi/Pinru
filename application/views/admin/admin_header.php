<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta http-equiv="refresh" content="5" /> -->
    <title>Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontawesome-free-5.10.1-web/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/mdb.min.css" rel="stylesheet">
    <!-- style -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- jquery data table -->
    <link href="<?php echo base_url() ?>assets/css/addons/datatables.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca"rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.scss"> 
</head>
<body class="green lighten-5">

<!-- MENU NAVBAR -->

<!--Navbar -->
<nav class="navbar mb-3 navbar-expand-lg fixed-top navbar-dark blue-gradient">
<!-- <a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i
    class="fas fa-bars"></i></a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('admin')?>">Dashboard
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('admin/ruangan')?>">Ruangan</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-5 nav-flex-icons">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
          <?php echo $this->session->userdata("nama"); ?>
        </a>
        <div class="dropdown-menu dropdown-menu-auto dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="<?=base_url('admin/edit_admin/1')?>">Edit User</a>
          <!-- <a class="dropdown-item" href="#">Another action</a> -->
          <a class="dropdown-item" href="<?=base_url('login/logout')?>">keluar</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<body>
<!--/.Navbar -->

<!-- SideNav slide-out button -->
<!-- <a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i
    class="fas fa-bars"></i></a> -->

<!-- Sidebar navigation -->
<!-- <div id="slide-out" class="side-nav fixed wide sn-bg-1">
  <ul class="custom-scrollbar"> -->
    <!-- Logo -->
    <!-- <li>
      <div class="logo-wrapper sn-ad-avatar-wrapper">
        <a href="#"><img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg"
            class="rounded-circle"><span></span></a>
      </div>
    </li> -->
    <!--/. Logo -->
    <!-- Side navigation links -->
    <!-- <li>
      <ul class="collapsible collapsible-accordion">
        <li><a class="collapsible-header waves-effect arrow-r active"><i
              class="sv-slim-icon fas fa-chevron-right"></i>
            Submit blog<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#" class="waves-effect active">
                  <span class="sv-slim"> SL </span>
                  <span class="sv-normal">Submit listing</span></a>
              </li>
              <li><a href="#" class="waves-effect">
                  <span class="sv-slim"> RF </span>
                  <span class="sv-normal">Registration form</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i
              class="sv-slim-icon far fa-hand-point-right"></i>
            Instruction<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#" class="waves-effect">
                  <span class="sv-slim"> FB </span>
                  <span class="sv-normal">For bloggers</span></a>
              </li>
              <li><a href="#" class="waves-effect">
                  <span class="sv-slim"> FA </span>
                  <span class="sv-normal">For authors</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="sv-slim-icon fas fa-eye"></i> About<i
              class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="#" class="waves-effect">
                  <span class="sv-slim"> I </span>
                  <span class="sv-normal">Introduction</span></a>
              </li>
              <li><a href="#" class="waves-effect">
                  <span class="sv-slim"> MM </span>
                  <span class="sv-normal">Monthly meetings</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="sv-slim-icon far fa-envelope"></i>
            Contact me<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a href="#" class="waves-effect">
                  <span class="sv-slim"> F </span>
                  <span class="sv-normal">FAQ</span>
                </a>
              </li>
              <li>
                <a href="#" class="waves-effect">
                  <span class="sv-slim"> W </span>
                  <span class="sv-normal">Write a message</span>
                </a>
              </li>
            </ul>
          </div>
        </li> -->
        <!-- <li><a id="toggle" class="waves-effect"><i class="sv-slim-icon fas fa-angle-double-left"></i>Minimize
            menu</a>
        </li> -->
      <!-- </ul>
    </li> -->
    <!--/. Side navigation links -->
  <!-- </ul>
  <div class="sidenav-bg rgba-blue-strong"></div>
</div> -->
<!--/. Sidebar navigation -->