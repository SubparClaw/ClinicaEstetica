(function(jQuery) {
    "use strict";
    jQuery(document).ready(function() {
        var rightSideBarMini = false;
        checkRightSideBar(rightSideBarMini);
        jQuery(document).on('click', '.right-sidebar-toggle', function() {
            if (rightSideBarMini) {
                rightSideBarMini = false;
            } else {
                rightSideBarMini = true;
            }
            checkRightSideBar(rightSideBarMini);
        })
    });
    function checkRightSideBar(rightSideBarMini) {
        if (rightSideBarMini) {
            rightSideBarShow();
        } else {
            rightSideBarHide()
        }
    }
    function rightSideBarShow() {
        jQuery('.right-sidebar-mini').addClass('right-sidebar')
    }
    function rightSideBarHide() {
        jQuery('.right-sidebar-mini').removeClass('right-sidebar')
    }
}
)(jQuery);
var options = {
    chart: {
        height: 400,
        type: 'bar',
        sparkline: {
            show: false
        },
        toolbar: {
            show: false
        },
    },
    colors: ['#089bab', '#ffd400'],
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '30%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: false,
        width: 5,
        colors: ['#ffffff'],
    },
    series: [{
        name: 'Male',
        enabled: 'true',
        data: [44, 90, 90, 60, 115]
    }, {
        name: 'Female',
        data: [35, 80, 100, 70, 95]
    }],
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function(val) {
                return "$ " + val + " thousands"
            }
        }
    }
};
options.colors = ['#089bab', '#FC9F5B'];
if (jQuery('#bar-chart-6').length) {
    var chart = new ApexCharts(document.querySelector("#bar-chart-6"),options);
    chart.render();
}
if (jQuery('#chart-6').length) {
    var chart = new ApexCharts(document.querySelector("#chart-6"),options);
    chart.render();
}
var lastDate = 0;
var data = [];
var TICKINTERVAL = 86400000;
let XAXISRANGE = 777600000;
function getDayWiseTimeSeries(baseval, count, yrange) {
    var i = 0;
    while (i < count) {
        var x = baseval;
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
        data.push({
            x,
            y
        });
        lastDate = baseval;
        baseval += TICKINTERVAL;
        i++;
    }
}
getDayWiseTimeSeries(new Date('01 Sep  2023 GMT').getTime(), 10, {
    min: 10,
    max: 90
});
function getNewSeries(baseval, yrange) {
    var newDate = baseval + TICKINTERVAL;
    lastDate = newDate;
    for (var i = 0; i < data.length - 10; i++) {
        data[i].x = newDate - XAXISRANGE - TICKINTERVAL;
        data[i].y = 0;
    }
    data.push({
        x: newDate,
        y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
    })
}
function resetData() {
    data = data.slice(data.length - 10, data.length);
}
var options = {
    chart: {
        height: 150,
        type: 'area',
        animations: {
            enabled: true,
            easing: 'linear',
            dynamicAnimation: {
                speed: 1000
            }
        },
        toolbar: {
            show: false
        },
        sparkline: {
            enabled: true
        },
        group: 'sparklines',
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight',
        width: 3
    },
    series: [{
        data: data
    }],
    markers: {
        size: 4
    },
    xaxis: {
        type: 'datetime',
        range: XAXISRANGE,
    },
    yaxis: {
        max: 100
    },
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            inverseColors: false,
            opacityFrom: 0.5,
            opacityTo: 0,
            stops: [0, 90, 100]
        },
    },
    legend: {
        show: false
    },
};
options.colors = ['#089bab'];
if (jQuery('#wave-chart-7').length) {
    options.markers.size = 0;
    options.chart.type = 'area';
    options.stroke.curve = "smooth";
    options.chart.height = 70;
    var wave_chart_7 = new ApexCharts(document.querySelector("#wave-chart-7"),options);
    wave_chart_7.render();
}
if (jQuery('#chart-7').length) {
    var chart_7 = new ApexCharts(document.querySelector("#chart-7"),options);
    chart_7.render();
}
options.colors = ['#FC9F5B'];
if (jQuery('#wave-chart-8').length) {
    options.markers.size = 0;
    options.chart.height = 70;
    options.stroke.curve = "smooth";
    options.chart.type = 'area';
    var wave_chart_8 = new ApexCharts(document.querySelector("#wave-chart-8"),options);
    wave_chart_8.render();
}
if (jQuery('#chart-8').length) {
    var chart_8 = new ApexCharts(document.querySelector("#chart-8"),options);
    chart_8.render();
}
options.colors = ['#00d0ff'];
if (jQuery('#wave-chart-9').length) {
    options.markers.size = 0;
    options.chart.height = 70;
    options.stroke.curve = "smooth";
    options.chart.type = 'area';
    var wave_chart_9 = new ApexCharts(document.querySelector("#wave-chart-9"),options);
    wave_chart_9.render();
}
