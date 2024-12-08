<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Panel de Control</title>
    <link rel="icon" href="img/logo.png" type="image/png">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/css/bootstrap1.min.css">
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/themefy_icon/themify-icons.css">
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/select2/css/select2.min.css" type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/niceselect/css/nice-select.css" type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/gijgo/gijgo.min.css" type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/font_awesome/css/all.min.css" type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/tagsinput/tagsinput.css" type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/css/style1.css" type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/css/colors/default.css" id="colorSkinCSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="crm_body_bg">
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="modal-content cs_modal">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cambiar contraseña</h5>
                                    </div>
                                    <div id="page-wrapper">
                                        <div class="main-page login-page ">
                                            <div class="widget-shadow">
                                                <div class="login-body">
                                                <div class="modal-body">
                                                    <form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
                                                        <p style="font-size:16px; color:red" align="center">
                                                            <?php if ($msg) {
                                                                echo $msg;
                                                            } ?>
                                                        </p>
                                                        <div class="mb-3">
                                                             <input type="password" name="nuevacontrasena" class="lock form-control" placeholder="Nueva Contraseña" required="true">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="password" name="confirmcontrasena" class="lock form-control" placeholder="Confirmar Contraseña" required="true">
                                                        </div>
                                                        <div class="mb-3 d-flex justify-content-center">
                                                           <button type="submit" name="submit" class="btn btn-primary">Cambiar</button>
                                                       </div>

                                                        <div class="forgot-grid">
                                                            <div class="forgot">
                                                                <a href="index.php">Ya tienes una cuenta</a>
                                                            </div>
                                                            <div class="clearfix"> </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>2023 © Icaria <a href="#"> <i class="ti-heart"></i> </a><a href="#">Dashboard</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/jquery1-3.4.1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/popper1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/bootstrap1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/metisMenu.js"></script>
</body>

</html>
