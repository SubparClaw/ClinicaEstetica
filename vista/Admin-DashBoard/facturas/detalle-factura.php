<section class="sectionFactura">
    <div class="main_content_iner">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">

                        <div class="container outer-section" style="width: 1120px;">
                            <form class="form-horizontal" action="#" method ="post"role="form" id="datos_presupuesto" >
                                <div id="print-area">
                                    <div class="row pad-top font-big">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <a href="#" target="_blank">
                                                <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/img/lg.png"
                                                    alt="Logo" style="height: 70px; width: 300px">
                                            </a>
                                        </div>
                                        <?php
                                        $perfil = $this->ListarPerfil();
                                        if ($perfil) {?>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <strong>E-mail: </strong><?php echo $perfil['email']; ?> <br>
                                            <strong>Teléfono: </strong><?php echo $perfil['telefono']; ?> <br>
                                            <strong>Sitio web: </strong><?php echo $perfil['web']; ?>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <strong><?php echo $perfil['nombre_comercial'];?></strong>
                                            <br>
                                            Descripción: <?php echo $perfil['direccion']; ?>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <hr>
                                    <?php if ($fact): ?>
                                        <div class="row">
                                             <div class="col-lg-4 col-md-4 col-sm-4">
                                                  <h2>Detalles del cliente :</h2>
                                                  <h4><strong>Cliente: </strong><span id="cliente"><?php echo $fact->nombreCli; ?> </span></h4>
                                                  <h4><strong>Dirección: </strong><span id="direccion"><?php echo $fact->direccion; ?></span></h4>
                                                  <h4><strong>E-mail: </strong><span id="email"> <?php echo $fact->correo; ?> </span></h4>
                                                  <h4><strong>Teléfono: </strong><span id="telefono"> <?php echo $fact->telefono; ?></span></h4>
                                             </div>

                                             <div class="col-lg-4 col-md-4 col-sm-4">
                                                  <h2>Detalles Doctor :</h2>
                                                  <h4><strong>Doctor: </strong><span id="doctor"><?php echo $fact->nombreDoc; ?> </span></h4>
                                                  <input type="hidden" name="iddoctor" id="iddoctor">
                                                  <h4><strong>Especialidad: </strong><span id="especialidad"> <?php echo $fact->especialidad; ?></span></h4>
                                             </div>

                                             <div class="col-lg-4 col-md-4 col-sm-4">
                                                  <h2>Detalles de la factura:</h2>
                                                  <h4><strong>N°#: </strong><span id="idfactura"> <?php echo $fact->id_factura; ?></span></h4>
                                                  <h4><strong>Fecha: </strong><?php echo $fact->fecha; ?></h4>
                                                  <h4><strong>Hora: </strong><?php echo $fact->hora; ?></h4>
                                                  <span>Descripción: <?php echo $fact->descripcion; ?> </span>
                                             </div>
                                        </div>
                                        <?php else: ?>
                                        <p>No se encontraron datos de factura.</p>
                                        <?php endif; ?>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Código</th>
                                                            <th>Descripción</th>
                                                            <th class="text-center">Cantidad</th>
                                                            <th class="text-right">Precio unitario</th>
                                                            <th class="text-right">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="items">
                                                    <?php
                                                    $perfil = $this->ListarPerfil();
                                                    if ($perfil) {
                                                        $items = 1;
                                                        $suma = 0;

                                                        foreach ($factdetalle as $fila) {
                                                            $total = $this->TotalServicio($fila->precio, $fila->cantidad);
                                                            ?>
                                                            <tr>
                                                                <td class='text-center'><?php echo $fila->cod; ?></td>
                                                                <td><?php echo $fila->nomServicio; ?></td>
                                                                <td class='text-center'><?php echo $fila->cantidad; ?></td>
                                                                <td class='text-right'><?php echo $fila->precio; ?></td>
                                                                <td class='text-right'><?php echo $total; ?></td>
                                                            </tr>
                                                            <?php
                                                            $items++;
                                                            $suma += $total;
                                                        }

                                                        $neto = $suma;
                                                        $iva = $perfil['iva'];
                                                        $total_con_iva= $this->Total_con_IVA($iva, $neto); 
                                                        ?>
                                                       <tr>
                                                            <th colspan='5' class='text-right'></th>
                                                       </tr>
                                                        <tr>
                                                            <th colspan='4' class='text-right'>
                                                                NETO S/
                                                            </th>
                                                            <th class='text-right'>
                                                                <?php echo number_format($neto, 2); ?>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan='4' class='text-right'>
                                                                IVA (<?php echo $perfil['iva']; ?>%) S/
                                                            </th>
                                                            <th class='text-right'>
                                                                <?php echo number_format($this->fact->getTotal(), 2); ?>
                                                            </th>
                                                        </tr>

                                                        <tr>
                                                            <th colspan='4' class='text-right'>
                                                                TOTAL S/
                                                            </th>
                                                            <th class='text-right'>
                                                                <?php echo number_format($total_con_iva, 2); ?>
                                                            </th>
                                                        </tr>
                                                    <?php 

                                                } ?>
                                                </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pad-bottom">
                                    <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                        <!-- Agregué un id al botón para poder identificarlo fácilmente -->
                                        <button type="submit" id="btnGenerarFactura" class="btn btn-success">Imprimir</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    h2,
    .h2 {
        font-size: 30px;
    }

    h1,
    .h1,
    h2,
    .h2,
    h3,
    .h3 {
        margin-top: 20px;
        margin-bottom: 10px;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: inherit;
        font-weight: 500;
        line-height: 1.1;
        color: inherit;
    }

    h2 {
        display: block;
        font-size: 1.5em;
        margin-block-start: 0.83em;
        margin-block-end: 0.83em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
    }

    h4,
    .h4 {
        font-size: 18px;
    }

    h4,
    .h4,
    h5,
    .h5,
    h6,
    .h6 {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    @font-face {
        font-family: 'Glyphicons Halflings';

        src: url('../fonts/glyphicons-halflings-regular.eot');
        src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
    }

    .glyphicon-plus:before {
        content: "\2b";
        font-weight: bold;
        /* O ajusta el valor según tus preferencias */
    }


    .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings';
        font-style: normal;
        font-weight: normal;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .btn-sm,
    .btn-group-sm>.btn {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }

    .btn-info {
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    input,
    button,
    select,
    textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    /*button,
    html input[type="button"],
    input[type="reset"],
    input[type="submit"] {
        -webkit-appearance: button;
        cursor: pointer;
    }*/

    button,
    select {
        text-transform: none;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        margin: 0;
        font: inherit;
        color: inherit;
    }

    button {
        text-rendering: auto;
        color: buttontext;
        letter-spacing: normal;
        word-spacing: normal;
        line-height: normal;
        text-transform: none;
        text-indent: 0px;
        text-shadow: none;
        text-align: center;
        cursor: default;
    }

    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }

    .btn-sm,
    .btn-group-sm>.btn {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px;
    }

    .btn-info {
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da;
    }
</style>