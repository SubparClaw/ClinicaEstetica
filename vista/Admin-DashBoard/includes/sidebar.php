<?php
session_start();

if(($_SESSION['idusuario'])==0){
    header('Location: http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/Admin-DashBoard/paginadeerror/404.php');
}
?>
 

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Panel de Control</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/css/stylenoti.css">
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/css/bootstrap1.min.css" >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/themefy_icon/themify-icons.css" >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/select2/css/select2.min.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/niceselect/css/nice-select.css"  type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/owl_carousel/css/owl.carousel.css" type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/gijgo/gijgo.min.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/font_awesome/css/all.min.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/swiper_slider/css/swiper.min.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/tagsinput/tagsinput.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/css/jquery.dataTables.min.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/css/responsive.dataTables.min.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/css/buttons.dataTables.min.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/text_editor/summernote-bs4.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/morris/morris.css" type='text/css'>
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/material_icon/material-icons.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/css/metisMenu.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/css/style1.css" type='text/css' >
    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/css/colors/default.css" id="colorSkinCSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/cssFac/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    
</head>

<body class="crm_body_bg">

    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a href="?c=paneladmin"><img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/lg.png" alt style="width: 150px; height: 50px"></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="side_menu_title">
                <span>Panel de control</span>
            </li>
            <li class="mm-active">
                <a class="has-arrow" href="?c=paneladmin" aria-expanded="false">

                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/1.svg" alt>
                    <span>Panel de control</span>
                </a>
                <ul>
                    <li><a class="active" href="?c=paneladmin">Inicio</a></li>
                </ul>
            </li>
            <li class="side_menu_title">
                <span>Applications</span>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/12.svg" alt>
                    <span>Citas</span>
                </a>
                <ul>
                    <li><a href="?c=cita&a=AceptarCita">Aceptar Cita</a></li>
                    <li><a href="?c=cita&a=VerTodasCitas">Todas las Citas</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/8.svg" alt>
                    <span>Servicios</span>
                </a>
                <ul>
                    <li><a href="?c=servicio&a=FormServicio">Registrar Servicio</a></li>
                    <li><a href="?c=servicio">Administrar Servicio</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/6.svg" alt>
                    <span>Clientes</span>
                </a>
                <ul>
                    <li><a href="?c=cliente&a=FormCliente">Registrar Cliente</a></li>
                    <li><a href="?c=cliente">Administrar Cliente</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/9.svg" alt>
                    <span>Doctor(es)</span>
                </a>
                <ul>
                    <li><a href="?c=doctores&a=FormDoctor">Registrar Doctor(es)</a></li>
                    <li><a href="?c=doctores">Administrar Doctor(es)</a></li>
                </ul>
            </li>
            <!--li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/10.svg" alt>
                    <span>Productos</span>
                </a>
                <ul>
                    <li><a href="?c=producto&a=FormProducto">Registrar Productos</a></li>
                    <li><a href="?c=producto">Administrar Productos</a></li>
                </ul>
            </li
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/2.svg" alt>
                    <span>Pagina</span>
                </a>
                <ul>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="resister.html">Register</a></li>
                    <li><a href="forgot_pass.html">Forgot Password</a></li>
                </ul>
            </li>-->
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/3.svg" alt>
                    <span>Facturas</span>
                </a>
                <ul>
                    <li><a href="?c=factura&a=FormFactura">Nueva Factura</a></li>
                    <li><a href="?c=factura">Administrar Facturas</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/9.svg" alt>
                    <span>Usuarios</span>
                </a>
                <ul>
                    <li><a href="?c=usuario&a=FormUsuario">Registrar Usuario</a></li>
                    <li><a href="?c=usuario">Administrar Usuarios</a></li>
                </ul>
            </li>
            <li class>
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/menu-icon/5.svg" alt>
                    <span>Roles y Permisos</span>
                </a>
                <ul>
                    <li><a href="?c=rolespermisos">Administrar Roles y Permisos</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <section class="main_content dashboard_part">