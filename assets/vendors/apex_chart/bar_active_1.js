// Hacer la solicitud AJAX al controlador PHP
$.ajax({
    url: 'http://localhost/proyecto-IngWeb_ClinicaEstetica/?c=paneladmin&a=graficos',
    type: 'GET',
    dataType: 'json',
    success: function (datos) {
        // Verificar si los datos son un array o un objeto
        var dataArray = Array.isArray(datos) ? datos : [datos];

        // Aquí puedes trabajar con los datos recibidos
        var options = {
            series: [{
                name: 'Flujo de fondos',
                data: dataArray.map(item => parseFloat(item.totalVentas)) // Asegúrate de convertir a número si es necesario
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    colors: {
                        ranges: [{
                            from: -100,
                            to: -46,
                            color: '#e64141'
                        }, {
                            from: -45,
                            to: 0,
                            color: '#089bab'
                        }, {
                            from: 0,
                            to: 20,
                            color: '#FC9F5B'
                        }]
                    },
                    columnWidth: '80%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            yaxis: {
                title: {
                    text: 'Ganancias (S/.)',
                },
                labels: {
                    formatter: function(y) {
                        return y.toFixed(0) + " S/";
                    }
                }
            },
            xaxis: {
                type: 'category',
                categories: dataArray.map(item => item.periodo),
                labels: {
                    rotate: -90
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#bar_wev"), options);
        chart.render();
    },
    error: function (error) {
        console.error('Error al cargar datos: ', error);
    }
});
