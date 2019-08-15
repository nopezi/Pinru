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
    <link href="https://fonts.googleapis.com/css?family=Roboto"rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/styles.scss">
</head>
<body>
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Material form login -->
        <div class="col-10 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header info-color white-text ">
                    
                    <ul class="list-inline">
                        <li class="list-inline-item"><h6><i class="fas fa-arrow-left"></i></h5></li>
                        <li class="list-inline-item"><a class="text-white" href="<?=base_url()?>">Back</a></li>
                    </ul>
                    <h5 class="text-center"><strong>Sign in</strong></h5>
                </div>
                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">
                <?php if(!empty($this->session->flashdata('error'))){ ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="<?php echo base_url('login/aksi_login');?>" method="post">

                        <!-- Email -->
                        <div class="md-form">
                        <input type="text" id="materialLoginFormEmail" name="username" class="form-control">
                        <label for="materialLoginFormEmail">Username</label>
                        </div>

                        <!-- Password -->
                        <div class="md-form">
                        <input type="password" id="materialLoginFormPassword" name="password" class="form-control">
                        <label for="materialLoginFormPassword">Password</label>
                        </div>

                        <div class="d-flex justify-content-around">
                        <div>
                            <!-- Remember me -->
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                            <label class="form-check-label" for="materialLoginFormRemember">Remember me </label>
                            </div>
                        </div>
                        </div>

                        <!-- Sign in button -->
                        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

                    </form>
                    <!-- Form -->

                </div>

            </div>
        </div>
        <!-- Material form login -->
    </div>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js"></script>    
</body>
</html>