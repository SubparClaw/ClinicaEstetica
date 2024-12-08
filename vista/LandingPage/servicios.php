<section class="breadcrumb-option spad set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/breadcrumb-bg.jpg"
    style="background-image: url(&quot;img/breadcrumb-bg.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Nuestros Servicios</h2>
            <div class="breadcrumb__links">
              <a href="?c=Inicio">Inicio</a>
              <span>Servicios</span>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


<section class="services-page spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 order-lg-2">
        <div class="services__details">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="services__details__title">
              <!--?= $s->$this->ListarCategoria() ?-->
                <span><!--?=$s->nombreCategoria ?-->Procedimientos faciales</span>
                <h3><!--?=$s->nomServicio ?-->Estiramiento facial mínimo</h3>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="services__details__widget">
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <h3>s/ <!--?=$s->precio ?--></h3>
              </div>
            </div>
          </div>
          <div class="services__details__pic">
            <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/services-details.jpg" alt="">
          </div>
          <div class="services__details__text">
            <p><!--?=$s->descripcion ?--></p>
            <p>Experimenta la diferencia con nuestro estiramiento facial mínimo, diseñado para realzar tu belleza de
              manera sutil y natural. Nuestro equipo altamente calificado se dedica a brindarte los mejores resultados
              mientras te asegura una experiencia cómoda y segura. Dile adiós a los signos del envejecimiento y
              disfruta de una apariencia más fresca y juvenil.</p>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="services__details__item__pic">
                <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/sd-1.jpg" alt="">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="services__details__item__pic">
                <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/sd-2.jpg" alt="">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="services__details__item__pic">
                <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/sd-3.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="services__details__desc">
            <p>En nuestra clínica, encontrarás profesionales comprometidos que se preocupan por tu salud y te
              brindarán la atención que te mereces. Confía en nosotros para cuidar de ti y ayudarte a vivir una vida
              más saludable y plena.
            </p>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <ul class="services__details__feature">
                  <li><i class="fa fa-check-circle"></i> Atención médica y de rutina</li>
                  <li><i class="fa fa-check-circle"></i> Excelencia en el cuidado de la salud </li>
                  <li><i class="fa fa-check-circle"></i> Construir un medio ambiente saludable</li>
                  <li><i class="fa fa-check-circle"></i> Mejorar la calidad de vida</li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <ul class="services__details__feature">
                  <li><i class="fa fa-check-circle"></i> Orientación y asistencia continua</li>
                  <li><i class="fa fa-check-circle"></i> Profesionales altamente capacitados</li>
                  <li><i class="fa fa-check-circle"></i> Enfoque en resultados personalizados</li>
                  <li><i class="fa fa-check-circle"></i> Tratamientos avanzados y seguros</li>
                </ul>
              </div>
            </div>
            <p>En nuestro centro, nos esforzamos por proporcionar atención médica de calidad y un entorno saludable.
              Nuestro enfoque en la excelencia en la atención médica garantiza que te sientas bien cuidado en todo
              momento. Construimos un entorno saludable para mejorar la calidad de vida de nuestros pacientes.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 order-lg-1">
        <div class="services__sidebar">
          <div class="services__accordion">
            <div class="services__title">
              <h4><img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/icons/services-icon.png" alt=""> Todos los servicios</h4>
            </div>
            <div class="accordion" id="accordionExample">
            <?php foreach($this->catDAO->ObtenerNomCat() as $index => $cat):?>
              <div class="card">
                  <div class="card-heading active">
                      <a data-toggle="collapse" data-target="#collapse<?=$index?>">
                          <?=$cat->nombreCategoria?>
                      </a>
                  </div>
                  <div id="collapse<?=$index?>" class="collapse <?= ($index === 0) ? 'show' : '' ?>" data-parent="#accordionExample">
                      <div class="card-body">
                          <ul>
                              <?php foreach($this->dao->ListarServicios($cat->nombreCategoria) as $s):?>
                                  <li>
                                    <a href="?c=servicio&a=ListarServicioDet&nomServicio=<?=$s->nomServicio?>"><?=$s->nomServicio?></a>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
        
            </div>
          </div>
        </div>
        <div class="services__appoinment">
          <div class="services__title">
            <h4><img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/icons/services-icon.png" alt=""> Obtén una cita</h4>
          </div>
          <form action="?c=cita&a=crear" method="post">
              <input type="text" placeholder="Nombre" name="nombres" required>
              <input type="number" placeholder="Teléfono" name="telefono" required maxlength="10" pattern="[0-9]+">
              <input type="text" placeholder="Correo Electrónico" name="correo" required>
              <select name="tipo_servicio" id="tipo_servicio" required>
                  <option value="" disabled selected>Seleccione un servicio</option>
                  <?php foreach($this->ListarServicios() as $s):?>
                      <option value="<?=$s->id_servicio?>"><?=$s->nomServicio?></option>
                  <?php endforeach; ?>
              </select>
                <select name="doctores" id="doctores">
                    <option value="" disabled selected>Seleccione un doctor@</option>
                    <?php foreach($this->ListarDoctores() as $m):?>
                        <option value="<?= $m->getIdDoctor() ?>"><?= $m->getNombre() ?></option>
                    <?php endforeach; ?>
                </select>
              <div class="datepicker__item">
                  <input type="text" placeholder="Fecha" class="datepicker" name="fecha" required>
                  <i class="fa fa-calendar"></i>
              </div>
              <select name="hora" id="hora" required>
                  <option value="" disabled selected>Seleccione una hora</option>
                  <!-- Opciones para la hora -->
              </select>
              <button type="submit" class="site-btn">RESERVAR CITA</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>