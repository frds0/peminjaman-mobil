<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $judul ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/dist/img/forApps/sigap-icon.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="font-family: Poppins; font-size: 14px; background-size: 100% 100%; background-image: url('<?php echo base_url() ?>/assets/dist/img/forApps/bg.jpeg')">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="card rounded-lg">
            <div class="card card-outline" style="background-color: #39cccc;">
                <div class="card-header text-center">
                    <a href="<?php echo base_url() ?>" class="h3"><b>Peminjaman Mobil</b></a>
                </div>
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Silahkan Login</p>
                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo $this->session->flashdata('alert'); ?>
                    <form method="POST" action="<?php echo site_url('CTR_Login') ?>">
                        <div class="input-group mb-3">
                            <input type="text" id="npk" name="npk" class="form-control" placeholder="NPK">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-user" style="float: right; margin-right: 6px; position: relative; z-index: 2;"></span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="input-group mb-3">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <div>
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>

                                <a id="showHide" name="showHide" class="btn btn-rounded btn-noborder btn-outline" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show Password" style="float: right; margin-right: 0px; margin-top: -35px; position: relative; z-index: 2;">
                                    <span toggle="#password" class="fa fa-fw fa-eye fa-lg toggle-password text-secondary">
                                </a>
                                <!-- </span> -->
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12 text-center">
                                <button type="submit" style="background-color: #39cccc;"><i class="fa fa-sign-in-alt"></i> Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>

                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $(".toggle-password").click(function() {

                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var input = $($(this).attr("toggle"));
                    if (input.attr("type") == "password") {
                        input.attr("type", "text");
                        $("#showHide").attr('data-original-title', "Hide Password").tooltip('show');
                    } else {
                        input.attr("type", "password");
                        $("#showHide").attr('data-original-title', "Show Password").tooltip('show');
                    }
                });
            });
        </script>
</body>

</html>