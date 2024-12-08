
        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="single_element">
                            <div class="quick_activity">
                                <div class="row">
                                    <div class="col-12">
                                        <?php if ($icaria): ?>
                                        <div class="quick_activity_wrap">
                                            <div class="single_quick_activity d-flex">
                                                <div class="icon">
                                                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/icon/man.svg" alt>
                                                </div>
                                                <div class="count_content">
                                                    <h3><span class="counter"><?php echo $icaria->cantUsu ?></span> </h3>
                                                    <p>Usuarios</p>
                                                </div>
                                            </div>
                                            <div class="single_quick_activity d-flex">
                                                <div class="icon">
                                                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/icon/cap.svg" alt>
                                                </div>
                                                <div class="count_content">
                                                    <h3><span class="counter"><?php echo $icaria->cantDocEnfermera ?></span> </h3>
                                                    <p>Enfermeras</p>
                                                </div>
                                            </div>
                                            <div class="single_quick_activity d-flex">
                                                <div class="icon">
                                                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/icon/wheel.svg" alt>
                                                </div>
                                                <div class="count_content">
                                                    <h3><span class="counter"><?php echo $icaria->cantCli ?></span> </h3>
                                                    <p>Pacientes</p>
                                                </div>
                                            </div>
                                            <div class="single_quick_activity d-flex">
                                                <div class="icon">
                                                    <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/icon/pharma.svg" alt>
                                                </div>
                                                <div class="count_content">
                                                    <h3><span class="counter"><?php echo $icaria->cantDoc ?></span> </h3>
                                                    <p>Doctores</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-12">
                        <div class="white_box mb_30 ">
                            <div class="box_header border_bottom_1px  ">
                                <div class="main-title">
                                    <h3 class="mb_25">Graficos de ingresos</h3>
                                </div>
                            </div>
                            <div class="income_servay">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="count_content">
                                            <h3>S/. <span class="counter"><?php echo $gananciasHoy->totalVentasHoy ?></span> </h3>
                                            <p>Ingresos de hoy</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="count_content">
                                            <h3>S/. <span class="counter"><?php echo $gananciasSemana->totalVentasSemana ?></span> </h3>
                                            <p>Los ingresos de esta semana</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="count_content">
                                            <h3>S/. <span class="counter"><?php echo $gananciasMes->totalVentasMes ?></span> </h3>
                                            <p>Ingresos de este mes</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="count_content">
                                            <h3>S/. <span class="counter"><?php echo $gananciasAnio->totalVentasAnio ?></span> </h3>
                                            <p>Ingresos de este año</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="bar_wev"></div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="white_box QA_section card_height_100">
                            <div class="white_box_tittle list_header m-0 align-items-center">
                                <div class="main-title mb-sm-15">
                                    <h3 class="m-0 nowrap">Pacientes</h3>
                                </div>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field-area2">
                                        <div class="search_inner">
                                            <form Active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Buscar aquí...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table ">

                                <table class="table lms_table_active2">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre Del Cliente</th>
                                            <th scope="col">Fecha De La Cita</th>
                                            <th scope="col">Para</th>
                                            <th scope="col">Número de Cita</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($this->notiCita() as $cita): ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="patient_thumb d-flex align-items-center">
                                                    <div class="student_list_img mr_20">
                                                        <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/patient/pataint.png" alt srcset>
                                                    </div>
                                                    <p><?php echo $cita['nombres'] ?></p>
                                                </div>
                                            </th>
                                            <td><?php echo $cita['fecha'] ?></td>
                                            <td><?php echo $cita['hora'] ?></td>
                                            <td><?php echo $cita['citanum'] ?></td>
                                            <td>
                                                <div class="amoutn_action d-flex align-items-center">
                                                
                                                    <div class="dropdown ms-4">
                                                        <a class=" dropdown-toggle hide_pils" href="#" role="button"
                                                            id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="#<?php echo $cita['id_cita'] ?>">Ver</a>
                                                            <a class="dropdown-item" href="#"<?php echo $cita['id_cita'] ?>>Aceptar</a>
                                                            <a class="dropdown-item" href="#"<?php echo $cita['id_cita'] ?>>Rechazar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 ">
                        <div class="white_box card_height_50 mb_30">
                            <div class="box_header border_bottom_1px  ">
                                <div class="main-title">
                                    <h3 class="mb_25">Número de Clientes por Género</h3>
                                </div>
                            </div>
                            <div id="chart-7"></div>
                            <div class="row text-center mt-3">
                                <div class="col-sm-6">
                                    <h6 class="heading_6 d-block">Mes pasado</h6>
                                    <p class="m-0">0</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="heading_6 d-block">Mes actual</h6>
                                    <p class="m-0">8</p>
                                </div>
                            </div>
                        </div>
                        <div class="white_box card_height_50 mb_30">
                            <div class="box_header border_bottom_1px  ">
                                <div class="main-title">
                                    <h3 class="mb_25">Total clientes atendidos</h3>
                                </div>
                            </div>
                            <div id="chart-8"></div>
                            <div class="row text-center mt-3">
                                <div class="col-sm-6">
                                    <h6 class="heading_6 d-block">El mes pasado</h6>
                                    <p class="m-0">1</p>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="heading_6 d-block">Mes actual</h6>
                                    <p class="m-0">15</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="white_box card_height_100">
                            <div class="box_header border_bottom_1px  ">
                                <div class="main-title">
                                    <h3 class="mb_25">Personal de la Estética</h3>
                                </div>
                            </div>
                            <div class="staf_list_wrapper sraf_active owl-carousel">

                                <div class="single_staf">
                                    <div class="staf_thumb">
                                        <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/staf/1.png" alt>
                                    </div>
                                    <h4>Dr. Sysla J Smith</h4>
                                    <p>Doctor</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
