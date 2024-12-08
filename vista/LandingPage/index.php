<section class="hero spad set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/hero-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="hero__text">
            <span>Icaria salud</span>
            <h2>Tome el mejor tratamiento de calidad del mundo</h2>
            <a href="#" class="primary-btn normal-btn">Contáctanos</a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="consultation">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="consultation__form">
            <div class="section-title">
              <span>SOLICITA TU</span>
              <h2>Consulta</h2>
            </div>
            <form action="?c=cita&a=crear" method="POST">
                <input type="text" placeholder="Nombres" name="nombres" required>
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
                <select name="hora" id="hora" required >
                    <option value="" disabled selected>Seleccione una hora</option>
                    <!-- Opciones para la hora -->
                </select>
                <button type="submit" class="site-btn">RESERVAR UNA CITA</button>
            </form>

          </div>
        </div>
        <div class="col-lg-8">
          <div class="consultation__text">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="consultation__text__item">
                  <div class="section-title">
                    <span>Bienvenido a la estética</span>
                    <h2>Encuentre los mejores médicos con <b>ICARIA</b></h2>
                  </div>
                  <p>Ofrecemos tratamientos de alta calidad. Contáctenos para más información y programar una consulta.
                  </p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="consultation__video set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/consultation-video.jpg">
                  <a href="https://www.youtube.com/watch?v=PXsuI67s2AA" class="play-btn video-popup">
                    <i class="fa fa-play"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="chooseus spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-title">
            <span>¿Por qué elegirnos?</span>
            <h2>Oferta para ti</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="chooseus__item">
            <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/icons/ci-1.png" alt>
            <h5>Equipamiento avanzado</h5>
            <p>Equipos modernos y avanzados para ofrecerte los mejores tratamientos.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="chooseus__item">
            <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/icons/ci-2.png" alt>
            <h5>Médicos calificados</h5>
            <p>Profesionales médicos altamente calificados para cuidar de tu salud y bienestar.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="chooseus__item">
            <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/icons/ci-3.png" alt>
            <h5>Servicios certificados</h5>
            <p>Servicios certificados que cumplen con los estándares de calidad y seguridad.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="chooseus__item">
            <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/icons/ci-4.png" alt>
            <h5>Atención de emergencia</h5>
            <p>Disponibilidad las 24 horas para brindarte atención médica de emergencia.</p>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="services spad set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/services-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-6">
          <div class="section-title">
            <span>Nuestros servicios</span>
            <h2>Oferta para ti</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="services__btn">
            <a href="#" class="primary-btn">Contáctenos</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="services__item">
            <div class="services__item__icon">
              <span class="flaticon-044-aesthetic"></span>
            </div>
            <div class="services__item__text">
              <h5>Procedimientos corporales</h5>
              <p>Ofrecemos una amplia gama de procedimientos corporales para ayudarte a lograr la apariencia que deseas.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="services__item">
            <div class="services__item__icon">
              <span class="flaticon-027-beauty"></span>
            </div>
            <div class="services__item__text">
              <h5>Procedimientos faciales</h5>
              <p>Nuestros procedimientos faciales están diseñados para realzar tu belleza natural y rejuvenecer tu piel.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="services__item">
            <div class="services__item__icon">
              <span class="flaticon-031-anatomy"></span>
            </div>
            <div class="services__item__text">
              <h5>Procedimientos de mama</h5>
              <p>Contamos con opciones de procedimientos de mama que se adaptan a tus necesidades y deseos estéticos.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="services__item">
            <div class="services__item__icon">
              <span class="flaticon-008-abdominoplasty"></span>
            </div>
            <div class="services__item__text">
              <h5>Cuidado de la piel y belleza</h5>
              <p>Nuestros tratamientos de cuidado de la piel están diseñados para mantener tu piel sana y radiante.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="team spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-title">
            <span>Nuestro Equipo</span>
            <h2>Nuestros Expertos Médicos</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="team__item">
            <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/team/team-1.jpg" alt>
            <h5>Caroline Grant</h5>
            <span>Cirujano Plástico</span>
            <div class="team__item__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="team__item">
            <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/team/team-2.jpg" alt>
            <h5>Dra. Maria Angel</h5>
            <span>Cirujano Plástico</span>
            <div class="team__item__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="team__item">
            <img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/team/team-3.jpg" alt>
            <h5>Nathan Mullins</h5>
            <span>Cirujano Plástico</span>
            <div class="team__item__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <div class="gallery">
    <div class="gallery__container">
      <div class="grid-sizer"></div>
      <div class="gc__item set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-1.jpg">
        <a href="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-1.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
      </div>
      <div class="gc__item set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-2.jpg">
        <a href="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-2.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
      </div>
      <div class="gc__item set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-3.jpg">
        <a href="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-3.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
      </div>
      <div class="gc__item gc__item__large set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-4.jpg">
        <a href="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-4.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
      </div>
      <div class="gc__item set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-5.jpg">
        <a href="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-5.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
      </div>
      <div class="gc__item set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-6.jpg">
        <a href="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-6.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
      </div>
      <div class="gc__item set-bg" data-setbg="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-7.jpg">
        <a href="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/gallery/gallery-7.jpg" class="image-popup"><i class="fa fa-search-plus"></i></a>
      </div>
    </div>
  </div>

  <section class="latest spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-6">
          <div class="section-title">
            <span>Nuestras Noticias</span>
            <h2>Consejos para el cuidado de la piel</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="latest__btn">
            <a href="#" class="primary-btn">Ver todas las noticias</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="latest__item">
            <h5><a href="#">Descubre cómo lograr un brillo natural en esta temporada de fiestas</a></h5>
            <p>Obtén consejos expertos sobre cuidado de la piel para lucir radiante durante las celebraciones.</p>
            <ul>
              <li><img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/blog/blog-author.jpg" alt> John Doe</li>
              <li>6 de diciembre de 2019</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="latest__item">
            <h5><a href="#">Mejora tu piel con estos 10 consejos principales para el cuidado de la piel</a></h5>
            <p>Aprende técnicas efectivas para mantener tu piel sana y radiante todos los días.</p>
            <ul>
              <li><img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/blog/blog-author.jpg" alt> John Doe</li>
              <li>6 de diciembre de 2019</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="latest__item">
            <h5><a href="#">8 formas de proteger tu piel si haces ejercicio al aire libre este invierno</a></h5>
            <p>Conoce los mejores consejos para cuidar tu piel mientras te ejercitas al aire libre durante el invierno.
            </p>
            <ul>
              <li><img src="http://localhost/proyecto-IngWeb_ClinicaEstetica/vista/LandingPage/img/blog/blog-author.jpg" alt> John Doe</li>
              <li>6 de diciembre de 2019</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>