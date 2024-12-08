
<div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="modal-content cs_modal">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= $titulo ?> Usuarios</h5>
                                </div>
                                <div class="modal-body">
                                <form action="?c=usuario&a=CrearCuenta" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="id_usuario" placeholder="ID" value="<?= htmlspecialchars($usu->getIdUsuario()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombres" required value="<?= htmlspecialchars($usu->getNombre())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required value="<?= htmlspecialchars($usu->getApellido()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" name="fecha_nacimiento" required value="<?= htmlspecialchars($usu->getFechaNacimiento()) ?>" >
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="genero" required>
                                            <option value="" >Genero</option>
                                            <option value="Mujer" <?php if ($usu->getGenero() == "Mujer") echo "selected"; ?>>Mujer</option>
                                            <option value="Hombre" <?php if ($usu->getGenero() == "Hombre") echo "selected"; ?>>Hombre</option>
                                            <option value="No definido" <?php if ($usu->getGenero() == "No definido") echo "selected"; ?>>No definido</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="dni" placeholder="DNI"  value="<?= htmlspecialchars($usu->getDni())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control" name="telefono" placeholder="Teléfono"  value="<?= htmlspecialchars($usu->getTelefono())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="correo" placeholder="Correo" required value="<?= htmlspecialchars($usu->getCorreo())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="<?php echo $hidden; ?>" class="form-control" name="nombreusuario" placeholder="Nombre de usuario" required value="<?= htmlspecialchars($usu->getNombreUsuario()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="<?php echo $hidden; ?>" class="form-control" name="contrasenia" placeholder="Contraseña" required value="<?= htmlspecialchars($usu->getContrasenia()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="rol" required>
                                            <option value="" selected disabled>Rol</option>
                                            <?php foreach ($rol as $r): ?>
                                                <option value="<?= $r->id_rol ?>" <?= $usu->getRol() == $r->id_rol ? 'selected' : ''; ?>>
                                                    <?= $r->nombre_rol ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <button type="submit" name="submit" class="btn_1 full_width text-center"><?= htmlspecialchars($titulo) ?></button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        