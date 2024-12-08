<div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Usuarios Registrados</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Buscar Usuario...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="?c=usuario&a=FormUsuario" data-bs-target="#addcategory"
                                            class="btn_1">Agregar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table mb_30">

                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                    <table class="table lms_table_active dataTable no-footer dtr-inline"
                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                        style="width: 1193px;">
                                        <thead>
                                            <tr role="row">
                                                <th scope="col" class="sorting_asc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 94px;" aria-sort="ascending"
                                                    aria-label="Id: activate to sort column descending">ID</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 152px;"
                                                    aria-label="Nombre: activate to sort column ascending">Nombres</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 148px;"
                                                    aria-label="Nombre de usuario: activate to sort column ascending">
                                                   Nombre de usuario</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 72px;"
                                                    aria-label="Rol: activate to sort column ascending">Rol</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 105px;"
                                                    aria-label="Estado: activate to sort column ascending">Estado</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 105px;"
                                                    aria-label="Acción: activate to sort column ascending">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($usu as $u):?>
                                            <tr role="row" class="odd">
                                                <td><?= $u->id_usuario ?></td>
                                                <td><a href="?c=usuario&a=verPerfil"><?= $u->nombre ?></a></td>
                                                <td><?= $u->nombreusuario ?></td>
                                                <td><?= $u->nombreRol ?></td>
                                                <td><a href="#" name="estado" class="status_btn" style="<?=$color?>"><?= $u->estado ?></a></td>
                                                <td>
                                                    <button class="btn btn-outline-success" onclick="window.location.href='?c=usuario&a=FormUsuario&usuid=<?= $u->id_usuario ?>'">✍️</button>
                                                    <button class="btn btn-outline-danger" onclick="window.location.href='?c=usuario&a=EliminarUsuario&usuid=<?= $u->id_usuario ?>'">❌</button>
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



        