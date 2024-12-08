
        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="modal-content cs_modal">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?= $titulo ?> Producto</h5>
                                </div>
                                <div class="modal-body">
                                <form action="?c=producto&a=CapturarProducto" method="POST">
                                    <div class="mb-3">
                                        <input type="" class="form-control" name="id_producto" placeholder="ID" value="<?= htmlspecialchars($p->getIdProducto()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre Producto" required="true" value="<?= htmlspecialchars($p->getNombre()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" id="description" name="descripcion" placeholder="Descripción" required="true" rows="12" cols="4"><?= htmlspecialchars($p->getDescripcion()) ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="precio" placeholder="Precio" required="true" value="<?= htmlspecialchars($p->getPrecio()) ?>">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control" name="cantidad" placeholder="Cantidad" required="true" value="<?= htmlspecialchars($p->getCantidad()) ?>">
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
        
        