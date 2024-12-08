        <div class="footer_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#">
                                    Dashboard</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/jquery1-3.4.1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/popper1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/bootstrap1.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/metisMenu.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/count_up/jquery.waypoints.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/chartlist/Chart.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/count_up/jquery.counterup.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/swiper_slider/js/swiper.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/niceselect/js/jquery.nice-select.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/owl_carousel/js/owl.carousel.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/gijgo/gijgo.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/jszip.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/vfs_fonts.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/datatable/js/buttons.print.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/chart.min.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/progressbar/jquery.barfiller.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/tagsinput/tagsinput.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/text_editor/summernote-bs4.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/apex_chart/apexcharts.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/js/custom.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/apex_chart/bar_active_1.js"></script>
    <script src="http://localhost/proyecto-IngWeb_ClinicaEstetica/assets/vendors/apex_chart/apex_chart_list.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $(".cliente").select2({
            ajax: {
                url: "http://localhost/proyecto-IngWeb_ClinicaEstetica/?c=factura&a=ListarClientes&nom=",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        nom: encodeURIComponent(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 2 
        }).on('change', function(e) {
            var idCli = $('.cliente').select2('data')[0].id;
            var email = $('.cliente').select2('data')[0].email;
            var telefono = $('.cliente').select2('data')[0].telefono;
            var direccion = $('.cliente').select2('data')[0].direccion;
            $('#idcliente').val(idCli);
            $('#email').html(email);
            $('#telefono').html(telefono);
            $('#direccion').html(direccion);
            
        });
    });

    $(document).ready(function() {
        $(".doctor").select2({
            ajax: {
                url: "http://localhost/proyecto-IngWeb_ClinicaEstetica/?c=factura&a=ListarDoctores&doc=",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        doc: encodeURIComponent(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 2 
        }).on('change', function(e) {
            var idDoc = $('.doctor').select2('data')[0].id;
            var especialidad = $('.doctor').select2('data')[0].especialidad;

            $('#especialidad').html(especialidad);
            $('#iddoctor').val(idDoc);

        });
    });

    </script>
</body>
</html>