<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meeting Room Reservation</title>
    <link rel='icon' href='<?=base_url()?>assets/gambar/favicon.jpeg' type='image/x-icon' />
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
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca"rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.scss">
</head>

<nav class="navbar mb-5 navbar-expand-lg fixed-top navbar-dark blue-gradient">
<!-- <a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i
    class="fas fa-bars"></i></a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('home/meeting_rule')?>">Meeting Rule</a>
      </li>
    </ul>
  </div>
</nav>
<body>