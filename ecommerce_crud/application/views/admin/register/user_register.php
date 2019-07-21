<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>asset/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url() ?>asset/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>asset/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url() ?>asset/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand col-md-2" href="<?php echo base_url('/') ?>"><b><i>www.e-shopper.com</i></b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active col-md-3">
                <a class="nav-link" href="<?php echo base_url('admin') ?>"><b>Login</b> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active col-md-4 offset-2">
                <a class="nav-link" href="<?php echo base_url('register') ?>"><b>Register</b>  <span
                            class="sr-only">(current)</span></a>
            </li>


        </ul>

    </div>
</nav>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text text-danger">Only Developer's are Allowed to Register as Admin !</h1>
        </div>
    </div>
    <br/>
    <h3 >
<!--        --><?php //echo validation_errors(); ?>
        <?php $message = $this->session->userdata('message');

        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        ?>
    </h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <!--                            <form class="form-horizontal" role="form"-->
                            <!--                                  action="-->
                            <?php //echo base_url('user/registration') ?><!--" method="post">-->
                            <?php echo form_open('user/registration', 'form-horizontal') ?>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">User Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" value="<?php echo set_value('name'); ?>"
                                           placeholder="Your Name" name="name" type="text" autofocus
                                           required>
                                    <small  class="text-danger"> <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                    </small>
                                </div>

                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">E-mail
                                    Address</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email"
                                           value="<?php echo set_value('email'); ?>"
                                           autofocus required>
                                    <small  class="text-danger"> <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Password" name="password1"
                                           value="<?php echo set_value('password1'); ?>"
                                           type="password" autofocus required>
                                    <small  class="text-danger"><?php echo form_error('password1', '<div class="error">', '</div>'); ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Confirm
                                    Password</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Confirm Password" name="password2"
                                           value="<?php echo set_value('password2'); ?>"
                                           type="password" autofocus required>
                                    <small  class="text-danger"><?php echo form_error('password2', '<div class="error">', '</div>'); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-4">
                                    <input class="form-control btn-block btn-primary" name="btn" type="submit"
                                           value="Register">

                                </div>
                            </div>

                            <?php echo form_close(); ?>
                            <!--                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url() ?>asset/admin/vendor/jquery/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url() ?>asset/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url() ?>asset/admin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url() ?>asset/admin/dist/js/sb-admin-2.js"></script>

</body>