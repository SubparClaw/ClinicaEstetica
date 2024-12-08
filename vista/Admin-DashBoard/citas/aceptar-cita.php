<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="main-page">
                        <div class="tables">
                            <h3 class="title1">Aceptar o Rechazar Citas</h3>
                            <div class="table-responsive bs-example widget-shadow">
                                <!--h4>Aceptar o Rechazar Citas:</h4-->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Número de Cita</th>
                                            <th>Nombre Cliente</th>
                                            <th>Número de Móvil</th>
                                            <th>Fecha de Cita</th>
                                            <th>Hora de Cita</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($this->notiCita() as $cita): ?>
                                        <tr>
                                            <th scope="row"><?php echo $cita['id_cita'] ?></th>
                                            <td><?php echo $cita['citanum'] ?></td>
                                            <td><?php echo $cita['nombres'] ?></td>
                                            <td><?php echo $cita['telefono'] ?></td>
                                            <td><?php echo $cita['fecha'] ?></td>
                                            <td><?php echo $cita['hora'] ?></td>
                                            <td><a href="?c=cita&a=CitaDetalle&viewid=<?php echo $cita['id_cita']; ?>">Acción</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>