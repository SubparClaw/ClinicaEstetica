<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Buscar...">
                            </div>
                            <button type="submit"> <img
                                    src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/icon/icon_search.svg"
                                    alt=""> </button>
                        </form>
                    </div>
                </div>

                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <div class="profile">
                                <div class="dropdown" style="position: relative; display: inline-block;">
                                    <?php
                                    $citas = $this->notiCita(); 
                                    $numcita = is_array($citas) ? count($citas) : 0; // Contar el número de citas

                                    if ($numcita == 0) {
                                        $numcita = 0;
                                    }
                                    ?>
                                    <a href="#" class="dropdown-toggle" id="notificationDropdown"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="color:white">
                                        <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/icon/bell.svg"
                                            alt="#">
                                        <span class="badge1 blue">
                                            <?php echo $numcita ?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>Tienes
                                                    <?php echo $numcita ?> notificaciones
                                                </h3>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="notification_desc">
                                                <?php
                                                if ($numcita > 0) {
                                                    foreach ($citas as $result) {
                                                ?>
                                                <a class="dropdown-item"
                                                    href="?c=cita&a=CitaDetalle&viewid=<?php echo $result['id_cita']; ?>">
                                                    Nueva cita recibida de
                                                    <?php echo $result['nombres']; ?>
                                                </a><br />
                                                <?php
                                                    }
                                                } else {
                                                ?>
                                                <a class="dropdown-item" href="?c=cita&a=VerTodasCitas">No se recibió
                                                    nueva cita</a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="?c=cita&a=AceptarCita">Ver todo</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="profile">
                                <div class="dropdown" style="position: relative; display: inline-block;">
                                    <a href="#" class="dropdown-toggle" id="messageDropdown" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="true" style="color:white">
                                        <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/icon/msg.svg"
                                            alt="#">
                                        <span class="badge1 blue">0</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3>Tienes 0 mensajes</h3>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="notification_desc">
                                                <a class="dropdown-item" href="#">No hay mensajes</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li>
                                            <div class="notification_bottom">
                                                <a href="#">Ver todo</a>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="profile_info">
                        <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/client_img.png" alt="#">
                        <div class="profile_info_iner">
                            <?php $u = $this->ObtenerUnUsuario(); ?> 
                            <p><?php echo $u->getNomrol(); ?></p>
                            <h5><?php echo $u->getNombre() . ' ' . $u->getApellido(); ?></h5>
                            <div class="profile_info_details">
                                <a href="?c=usuario&a=verPerfil">Ver Perfil <i class="ti-user"></i></a>
                                <a href="?c=usuario&a=actualizarPerfil">Configuración <i class="ti-settings"></i></a>
                                <a href="?c=inicioSesion&a=CerrarSesion">Cerrar Sesion <i class="ti-shift-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>