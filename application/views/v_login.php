<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Material form login -->
        <div class="card">
            <div class="card-header info-color white-text ">
                <h5><a href="<?=base_url()?>"><i class="fas fa-home"></i></a></h5>
                <h5 class="text-center">
                <strong>Sign in</strong>
                </h5>
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
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

                    <!-- Register -->
                    <!-- <p>Not a member?
                    <a href="">Register</a>
                    </p> -->

                    <!-- Social login
                    <p>or sign in with:</p>
                    <a type="button" class="btn-floating btn-fb btn-sm">
                    <i class="fab fa-facebook-f"></i>
                    </a>
                    <a type="button" class="btn-floating btn-tw btn-sm">
                    <i class="fab fa-twitter"></i>
                    </a>
                    <a type="button" class="btn-floating btn-li btn-sm">
                    <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a type="button" class="btn-floating btn-git btn-sm">
                    <i class="fab fa-github"></i>
                    </a> -->

                </form>
                <!-- Form -->

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