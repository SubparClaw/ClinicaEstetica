<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <!-- El siguiente bloque de código parece ser una sección de perfil del administrador -->
                    <div class="main-content">
                        <div id="page-wrapper">
                            <div class="main-page">
                                <div class="forms">
                                    <h3 class="title1">Perfil Administrador</h3>
                                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                                        <div class="form-title">
                                            <h4>Actualizar Perfil :</h4>
                                        </div>
                                        <!-- Bloque de formulario para actualizar el perfil del administrador -->
                                        <div class="form-body">
                                            <form method="post">
                                                <p style="font-size:16px; color:red" align="center">

                                                </p>
                                                <?php if ($row = $usu): ?>
                                                    <!-- Campos de formulario para el perfil -->
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nombre Administrador</label>
                                                        <input type="text" class="form-control" id="adminname" name="adminname" placeholder="Admin Name" value="<?php echo $row->getNombre()." ".$row->getApellido(); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Nombre de Usuario</label>
                                                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $row->getNombreUsuario(); ?>" readonly="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Número de Contacto</label>
                                                        <input type="text" id="contactnumber" name="contactnumber" class="form-control" value="<?php echo $row->getTelefono(); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Correo Electrónico</label>
                                                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $row->getCorreo(); ?>" readonly='true'>
                                                    </div>
                                                    <button type="submit" name="submit" >Actualizar</button>
                                                <?php endif; ?>
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
