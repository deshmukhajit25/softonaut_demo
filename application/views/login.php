<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = base_url();
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SIPL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo $base_url; ?>assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url; ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $base_url; ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <style>
            .help-block{color:red;}
        </style>
    </head>
    <body >
        <!-- BEGIN LOGIN -->
        <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="">
                                    <span> <img src="<?php echo $base_url; ?>assets/images/logo-light.jpg" alt="" height="50"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin
                                    panel.</p>
                            </div>
                            <form id="frmLogin" name="frmLogin" class="login-form" action="<?php echo $base_url; ?>login/signIn" method="post">
                           
                                <div class="alert alert-primary display-hide" <?= (empty($message) ? 'style="display:none;"' : '') ?>>
                                    <button class="close" data-close="alert"></button>
                                    <span><?= (!empty($message) ? @$message : 'Enter email and password.') ?> </span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" autocomplete="off" placeholder="Enter your email" value="<?php echo (isset($member_username) ? $member_username : set_value('email')); ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" autocomplete="off"  placeholder="Enter your password" value="<?php echo (isset($member_password) ? $member_password : set_value('password')); ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" name="remember" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                       <button class="btn btn-primary btn-block" type="submit">
                                            Log In </button>
<!--                                    <a href="dashboard.html"><button class="btn btn-primary btn-block" type="button">
                                            Log In </button></a>-->
                                </div>
                            </form>

                            <div class="text-center">
                                <h5 class="mt-3 text-muted">Sign in with</h5>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="" class="text-muted ml-1">Forgot your password?</a></p>
                            <p class="text-muted">Don't have an account? <a href="<?php echo site_url("register"); ?>" class="text-primary font-weight-medium ml-1">Sign Up</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
       </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <footer class="footer footer-alt">
        2021 - 2022 &copy;<a href="#" class="text-muted">SIPL</a>
    </footer>
    <!-- END COPYRIGHT -->
    <!-- BEGIN CORE PLUGINS -->

     <!-- END CORE PLUGINS -->
    <!-- Vendor js -->
    <script src="<?php echo $base_url; ?>assets/js/vendor.min.js"></script>
    <!-- App js -->
    <script src="<?php echo $base_url; ?>assets/js/app.min.js"></script>
    <!--<script src="<?php echo $base_url; ?>assets/js/pages/form-validation.init.js"></script>-->
    <script src="<?php echo $base_url; ?>assets/js/pages/toastr.init.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url; ?>assets/js/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    
    <script>
            jQuery(document).ready(function () {
                $('.login-form').validate({
                    errorElement: 'span',
                    errorClass: 'help-block',
                    focusInvalid: false,
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        },
                        remember: {
                            required: false
                        }
                    },
                    messages: {
                        email: {
                            required: "Email is required."
                        },
                        password: {
                            required: "Password is required."
                        }
                    },
                    invalidHandler: function (event, validator) {
                        $('.alert-primary', $('.login-form')).show();
                    },
                    highlight: function (element) {
                        $(element).closest('.form-control').addClass('border-primary');
                    },
                    success: function (label) {
                        label.closest('.form-control').removeClass('border-primary');
                        label.remove();
                    },
                    errorPlacement: function (error, element) {
                        error.insertAfter(element.closest('.form-control'));
                    },
                    submitHandler: function (form) {
                        form.submit();
                    }
                });
                $('.login-form input').keypress(function (e) {
                    if (e.which == 13) {
                        if ($('.login-form').validate().form()) {
                            $('.login-form').submit();
                        }
                        return false;
                    }
                });
            });
            function customBlockUI() {
                $.blockUI({
                    centerY: 0,
                    css: {
                        'z-index': '10052', padding: '11px', height: '45px', top: '60px', left: '', right: '10px'
                    }
                });
            }
            function customunBlockUI() {
                $.unblockUI();
            }
            
    </script>
    <!-- END JAVASCRIPTS -->
</body>
</html>