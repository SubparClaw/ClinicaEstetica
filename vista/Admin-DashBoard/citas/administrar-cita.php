<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">

                    <div class="main-page">
                        <div class="tables">
                            <h3 class="title1">Todas las Citas</h3>
                            <div class="table-responsive bs-example widget-shadow">
                                <!--h4>Todas las Citas:</h4-->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Número de Cita</th>
                                            <th>Nombre Cliente</th>
                                            <th>Número Celular</th>
                                            <th>Fecha de Cita</th>
                                            <th>Hora de Cita</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach($this->ListarCitas() as $cita): ?>
                                        <tr>
                                            <th scope="row"><?=$cita->getId_cita() ?></th>
                                            <td><?=$cita->getCitanum() ?></td>
                                            <td><?=$cita->getNombres() ?></td>
                                            <td><?=$cita->getTelefono() ?></td>
                                            <td><?=$cita->getFecha() ?></td>
                                            <td><?=$cita->getHora() ?></td>
                                            <td><a href="?c=cita&a=CitaDetalle&viewid=<?php echo $cita->getId_cita(); ?>">Detalle</a></td>
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