<?php

require_once "config/Conexiondb.php";

if(!isset($_GET['c'])){
    require_once "controlador/inicio.controller.php";
    $controlador = new InicioController();
    call_user_func(array($controlador,"Inicio"));
}else{
    $controlador = $_GET['c'];
    require_once "controlador/$controlador.controller.php";
    $controlador = ucwords($controlador)."controller";
    $controlador = new $controlador;
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func(array($controlador,$accion));
}
?>