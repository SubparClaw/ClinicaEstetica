<div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Doctores Registrados</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Buscar Doctores...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="?c=doctores&a=FormDoctor" data-bs-target="#addcategory"
                                            class="btn_1">Agregar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30" style="overflow-x: auto;">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1200px;">
                                        <thead>
                                            <tr role="row">
                                                <th scope="col" class="sorting_asc" style="width: 10px;">ID</th>
                                                <th scope="col" class="sorting" style="width: 130px;">Especialidad</th>
                                                <th scope="col" class="sorting" style="width: 130px;">Nombres</th>
                                                <th scope="col" class="sorting" style="width: 72px;">DNI</th>
                                                <th scope="col" class="sorting" style="width: 20px;">Genero</th>
                                                <th scope="col" class="sorting" style="width: 80px;">Correo</th>
                                                <th scope="col" class="sorting" style="width: 72px;">Teléfono</th>
                                                <th scope="col" class="sorting" style="width: 72px;">Estado</th>
                                                <th scope="col" class="sorting" style="width: 72px;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($doctores as $r): ?>
                                            <tr role="row" class="odd">
                                                <td><?= $r->getIdDoctor() ?></td>
                                                <td><?= $r->getEspecialidad() ?></td>
                                                <td><?= $r->getNombre() ?></td>
                                                <td><?= $r->getDni() ?></td>
                                                <td><?= $r->getGenero() ?></td>
                                                <td><?= $r->getCorreo() ?></td>
                                                <td><?= $r->getTelefono() ?></td>
                                                <td><a href="#" name="estado" class="status_btn" style="<?=$color?>"><?= $r->getEstado() ?></a></td>
                                                <td>
                                                    <button class="btn btn-outline-success" onclick="window.location.href='?c=doctores&a=FormDoctor&id=<?= $r->getIdDoctor() ?>'">Editar</button>
                                                    <button class="btn btn-outline-danger" onclick="window.location.href='?c=doctores&a=EliminarDocto&id=<?= $r->getIdDoctor() ?>'">Eliminar</button>
                                                </td>
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



        