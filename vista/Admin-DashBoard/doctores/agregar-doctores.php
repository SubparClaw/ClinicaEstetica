
<div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="modal-content cs_modal">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= $titulo ?> Doctor(es)</h5>
                                </div>
                                <div class="modal-body">
                                <form action="?c=doctores&a=CapturarDoctor" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="id_doctor" placeholder="ID" value="<?= htmlspecialchars($doc->getIdDoctor()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombres" required value="<?= htmlspecialchars($doc->getNombre())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required value="<?= htmlspecialchars($doc->getApellido()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" name="fecha_nacimiento" required value="<?= htmlspecialchars($doc->getFechaNacimiento()) ?>" >
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" name="genero" required>
                                            <option value="" >Genero</option>
                                            <option value="Mujer" <?php if ($doc->getGenero() == "Mujer") echo "selected"; ?>>Mujer</option>
                                            <option value="Hombre" <?php if ($doc->getGenero() == "Hombre") echo "selected"; ?>>Hombre</option>
                                            <option value="No definido" <?php if ($doc->getGenero() == "No definido") echo "selected"; ?>>No definido</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="dni" placeholder="DNI"  value="<?= htmlspecialchars($doc->getDni())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control" name="telefono" placeholder="Teléfono"  value="<?= htmlspecialchars($doc->getTelefono())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" name="correo" placeholder="Correo" required value="<?= htmlspecialchars($doc->getCorreo())?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="especialidad" placeholder="Especialidad" required value="<?= htmlspecialchars($doc->getEspecialidad()) ?>">
                                    </div>
                                    <div class="mb-3">
                                         <input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" required value="<?= htmlspecialchars($doc->getNacionalidad()) ?>">   
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" name="descripcion" placeholder="Descripción" required><?= htmlspecialchars($doc->getDescripcion()) ?></textarea>
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

        
        