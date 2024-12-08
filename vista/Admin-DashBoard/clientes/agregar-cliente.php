
<div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="modal-content cs_modal">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= $titulo ?> Cliente</h5>
                                </div>
                                <div class="modal-body">
                                <form action="?c=cliente&a=CapturarCliente" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="id_cliente" placeholder="ID" value="<?= htmlspecialchars($c->getIdCliente()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombres" required value="<?= htmlspecialchars($c->getNombre())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required value="<?= htmlspecialchars($c->getApellido()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" name="fecha_nacimiento" required value="<?= htmlspecialchars($c->getFechaNacimiento()) ?>" >
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="genero" required>
                                            <option value="" >Genero</option>
                                            <option value="Mujer" <?php if ($c->getGenero() == "Mujer") echo "selected"; ?>>Mujer</option>
                                            <option value="Hombre" <?php if ($c->getGenero() == "Hombre") echo "selected"; ?>>Hombre</option>
                                            <option value="No definido" <?php if ($c->getGenero() == "No definido") echo "selected"; ?>>No definido</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="dni" placeholder="DNI"  value="<?= htmlspecialchars($c->getDni())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control" name="telefono" placeholder="Teléfono"  value="<?= htmlspecialchars($c->getTelefono())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="correo" placeholder="Correo" required value="<?= htmlspecialchars($c->getCorreo())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="direccion" placeholder="Dirección" required value="<?= htmlspecialchars($c->getDireccion()) ?>">
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

        
        