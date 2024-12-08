

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="QA_section">
                            <div class="white_box_tittle list_header">
                                <h4>Productos Registrados</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="serach_field_2">
                                        <div class="search_inner">
                                            <form active="#">
                                                <div class="search_field">
                                                    <input type="text" placeholder="Buscar Producto">
                                                </div>
                                                <button type="submit"> <i class="ti-search"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="?c=producto&a=FormProducto"  data-bs-target="#addcategory"
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
                                                    aria-label="Nombre: activate to sort column ascending">Nombre
                                                </th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 148px;"
                                                    aria-label="Descripción: activate to sort column ascending">
                                                    Descripción</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 72px;"
                                                    aria-label="Precio: activate to sort column ascending">Precio</th>
                                                <th scope="col" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 72px;"
                                                    aria-label="Cantidad: activate to sort column ascending">Cantidad</th>
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
                                            <?php foreach ($this->dao->obtenerTodosLosProductos() as $r):?>
                                            <tr role="row" class="odd">
                                                <td><?= $r->Id_producto ?></td>
                                                <td><?= $r->nombre ?></td>
                                                <td><?= $r->descripcion ?></td>
                                                <td><?= $r->precio ?></td>
                                                <td><?= $r->cantidad ?></td>
                                                <td><a href="#" name="estado" class="status_btn" style="<?=$color?>"><?= $r->estado ?></a></td>
                                                <td>
                                                    <button class="btn btn-outline-success" onclick="window.location.href='?c=producto&a=FormProducto&id=<?= $r->Id_producto ?>'">✍️</button> |
                                                    <button class="btn btn-outline-danger" onclick="window.location.href='?c=producto&a=EliminarProducto&id=<?= $r->Id_producto ?>'">❌</button>
                                                </td>

                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                        aria-live="polite">Showing 1 to 10 of 11 entries</div>
                                    <div class="dataTables_paginate paging_simple_numbers"
                                        id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled"
                                            aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0"
                                            id="DataTables_Table_0_previous"><i class="ti-arrow-left"></i></a><span><a
                                                class="paginate_button current" aria-controls="DataTables_Table_0"
                                                data-dt-idx="1" tabindex="0">1</a><a class="paginate_button "
                                                aria-controls="DataTables_Table_0" data-dt-idx="2"
                                                tabindex="0">2</a></span><a class="paginate_button next"
                                            aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0"
                                            id="DataTables_Table_0_next"><i class="ti-arrow-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       