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

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">

                                    <div class="modal-content cs_modal">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Registro de cuenta</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="?c=inicioSesion&a=CrearCuenta">

                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="nombre" placeholder="Nombres" required value="">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required value="">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="date" class="form-control" name="fecha_nacimiento" required value="" >
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-control" name="genero" required>
                                                        <option value="" >Genero</option>
                                                        <option value="Mujer" >Mujer</option>
                                                        <option value="Hombre" >Hombre</option>
                                                        <option value="No definido" >No definido</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="dni" placeholder="DNI"  value="">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" class="form-control" name="telefono" placeholder="Teléfono"  value="">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="email" class="form-control" name="correo" placeholder="Correo" required value="">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="nombreUsuario" placeholder="Nombre de usuario" required value="">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña" required>
                                                </div>
                                                <div class="cs_check_box">
                                                    <input type="checkbox" id="check_box" class="common_checkbox">
                                                    <label class="form-label" for="check_box">
                                                    Mantenme al día
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn_1 full_width text-center" onclick="mostrarModal()"> Registrarse </button>
                                                <p> Ya tego una cuenta <a href="?c=Inicio&a=IniciarSesion">Iniciar Sesión</a></p>
                                                <div class="text-center">
                                                    <a href="?c=iniciosesion&a=ContrasenaOlvidada" class="pass_forget_btn">¿Has olvidado tu contraseña?</a>
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
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#">Dashboard</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-content cs_modal" id="successModal">
    <div class="modal-header">
        <h5 class="modal-title text-center" style="font-size: 20px; font-weight: bold;">Registro exitoso</h5>
    </div>
    <div class="modal-body">
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <img src="img/check.svg" alt="Checkmark" class="img-fluid mb-3" style="width: 100px;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <p class="text-center">¡Tu cuenta ha sido creada con éxito!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <p class="text-center">Ahora puedes iniciar sesión con tu nombre de usuario y contraseña.</p>
            </div>
        </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-success" onclick="window.location.href='?c=inicioSesion&a=IniciarSesion'">Iniciar Sesión</button>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>


    <!-- Scripts -->
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/jquery1-3.4.1.min.js"></script>
<!-- Otros scripts -->
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/jquery1-3.4.1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/popper1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/bootstrap1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/metisMenu.js"></script>
    <script>
        function mostrarModal() {
        // Abre el modal
        $("#successModal").modal("show");
        }

    </script>
</body>

</html>
