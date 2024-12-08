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
                                        <h5 class="modal-title">Inicia sesión</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="?c=InicioSesion&a=ValidarUsuario" method="post">

                                            <div class="">
                                                <input type="text" class="form-control" name="nombreUsuario" placeholder="Nombre de usuario">
                                            </div>
                                            <div class="">
                                                <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña">
                                            </div>
                                            <button type="submit" class="btn_1 full_width text-center">Iniciar Sesión</button>

                                            <p>¿Necesitas una cuenta?<a  href="?c=iniciosesion">Registrate</a></p>
                                            <div class="text-center">
                                                <a href="?c=iniciosesion&a=ContrasenaOlvidada" class="pass_forget_btn">¿Olvidaste tu contraseña?</a>
                                            </div>
                                            <h3></h3>
                                            <div class="text-center">
                                                <a href="index.php" class="pass_forget_btn">Volver a inicio</a>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#">Dashboard</a></p>
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
