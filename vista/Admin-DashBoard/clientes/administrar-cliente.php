<div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Clientes Registrados</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Buscar Cliente...">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="?c=cliente&a=FormCliente" data-bs-target="#addcategory"
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
                                                    aria-label="Apellidos: activate to sort column ascending">
                                                    Apellidos</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 148px;"
                                                    aria-label="DNI: activate to sort column ascending">
                                                   DNI</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 72px;"
                                                    aria-label="Genero: activate to sort column ascending">Genero</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 72px;"
                                                    aria-label="Correo: activate to sort column ascending">Correo</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 72px;"
                                                    aria-label="Teléfono: activate to sort column ascending">Teléfono</th>
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
                                            <?php foreach ($clientes as $r):?>
                                            <tr role="row" class="odd">
                                                <td><?= $r->getIdCliente() ?></td>
                                                <td><?= $r->getNombre() ?></td>
                                                <td><?= $r->getApellido() ?></td>
                                                <td><?= $r->getDni() ?></td>
                                                <td><?= $r->getGenero() ?></td>
                                                <td><?= $r->getCorreo() ?></td>
                                                <td><?= $r->getTelefono() ?></td>
                                                <td><a href="#" name="estado" class="status_btn" style="<?=$color?>"><?= $r->getEstado() ?></a></td>
                                                <td>
                                                    <button class="btn btn-outline-success" onclick="window.location.href='?c=cliente&a=FormCliente&id=<?= $r->getIdCliente() ?>'">✍️</button>
                                                    <button class="btn btn-outline-danger" onclick="window.location.href='?c=cliente&a=EliminarCliente&id=<?= $r->getIdCliente() ?>'">❌</button>
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



        