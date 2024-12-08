
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="modal-content cs_modal">
                        <div class="modal-header">
                            <h5 class="modal-title"><?= $titulo ?> Servicio</h5>
                        </div>
                        <div class="modal-body">
                        <form action="?c=servicio&a=CapturarServicio" method="POST">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="id_servicio" placeholder="ID" value="<?= htmlspecialchars($s->getIdServicio()) ?>">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nomServicio" placeholder="Nombre Servicio" required="true" value="<?= htmlspecialchars($s->getNomServicio()) ?>">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" name="descripcion" placeholder="Descripción" required="true" rows="12" cols="4"><?= htmlspecialchars($s->getDescripcion()) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="precio" placeholder="Precio" required="true" value="<?= htmlspecialchars($s->getPrecio()) ?>">
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

