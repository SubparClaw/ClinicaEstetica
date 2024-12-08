<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="main-page">
                        <div class="tables">
                            <span class="title1">Detalle de Cita</span>
                             <div class="table-responsive bs-example widget-shadow">
                                <p style="font-size:16px; color:red" align="center">
                                </p>
                                <!--h4>Ver Cita:</h4-->
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Número de Cita</th>
                                            <td><?=$cita->getCitanum() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nombre de Cliente</th>
                                            <td><?=$cita->getNombres() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Correo Electrónico</th>
                                            <td><?=$cita->getCorreo() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Número de Celular</th>
                                            <td><?=$cita->getTelefono() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de Cita</th>
                                            <td><?=$cita->getFecha() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Hora de Cita</th>
                                            <td><?=$cita->getHora() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Servicio Solicitado</th>
                                            <td><?=$cita->getId_servicio() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de Solicitud</th>
                                            <td><?=$cita->getFechaRegistro() ?></td>
                                        </tr>
                                        <tr>
                                            <th>Estado</th>
                                            <td>
                                                <?php if ($cita->getEstado() == 1) {
                                                    echo "Aceptado";
                                                } if($cita->getEstado() == 2) {
                                                    echo "Rechazado";
                                                } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                <!--?php if ($row['Observacion'] == "") { ?-->
                                    <?php if ($cita->getEstado() == "") { ?>
                                    <form  action="?c=cita&a=editar&viewid=<?php echo $cita->getId_cita(); ?>" method="post" enctype="multipart/form-data">
                                        <!--tr>
                                            <th>Observación :</th>
                                            <td><textarea name="remark" placeholder="" rows="12" cols="14"
                                                    class="form-control wd-450" required="true"></textarea></td>
                                        </tr-->
                                        <tr>
                                            <th>Estado :</th>
                                            <td>
                                                <select name="estado" class="form-control wd-450" required="true">
                                                    <option value="1" selected="true">Aceptado</option>
                                                    <option value="2">Rechazado</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr align="center">
                                            <td colspan="2"><button type="submit" name="submit"
                                                    class="btn btn-az-primary pd-x-20" style="background-color: #16bbe5">Enviar</button></td>
                                        </tr>
                                    </form>
                                <?php } else { ?>
                            </table>
                            <!--table class="table table-bordered">
                                <tr>
                                    <th>Observación</th>
                                    <td><!?php echo $row['Observacion']; ?></td>
                                </tr>
                                <tr>
                                    <th>Fecha de Observación</th>
                                    <td><!?php echo $row['FechaObser']; ?></td>
                                </tr>
                            </table-->
                        <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>