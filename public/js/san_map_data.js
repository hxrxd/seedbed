$(function(){
    var cargar_datos = function(dato_actual, dato_base, idBLD) {
        var barOptions = {
            series: {
                bars: {
                    show: true,
                    barWidth: 0.4,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.8
                        }, {
                            opacity: 0.8
                        }]
                    }
                }
            },
            xaxis: {
                tickDecimals: 0
            },
            colors: ["#1ab394"],
            grid: {
                color: "#999999",
                hoverable: true,
                clickable: true,
                tickColor: "#D4D4D4",
                borderWidth:0
            },
            legend: {
                show: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "x: %x, y: %y"
            }
        };
        var barData = {
            label: "bar",
            data: [
                [0, dato_actual],
                [0.5, dato_base]
            ]
        };
        $.plot($("#flot-bar-chart-"+idBLD), [barData], barOptions);
    
    };
    
    var cargar_datos_bar = function (idBLD, dato_actual, dato_base){
        Morris.Bar({
            element: 'morris-bar-chart-' + idBLD,
            data: [{ y: '2006', a: dato_actual, b: dato_base },
                { y: '2007', a: 75, b: 65 },
                { y: '2008', a: 50, b: 40 },
                { y: '2009', a: 75, b: 65 },
                { y: '2010', a: 50, b: 40 },
                { y: '2011', a: 75, b: 65 },
                { y: '2012', a: 100, b: 90 } ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            hideHover: 'auto',
            resize: true,
            barColors: ['#1ab394', '#cacaca'],
        });
    };
    
    $(".info-componente").each(function(){
        var componente = $(this);
        var idBLD = componente.data('idbld');
        console.log('-' + idBLD);
        jQuery.ajax({
                    url: '{{route("sanmap.infoDetails",["idBLD" => -1])}}'.replace('-1',idBLD),
                    type: "GET",
                    dataType: "text",
                    success: function(data) {
                        $('#info-'+ idBLD).html(data);
                        // var dato_actual = $('#dato-actual-'+idBLD).val();                    
                        // var dato_base = $('#dato-base-'+idBLD).val();
                        // // cargar_datos(dato_actual, dato_base, idBLD);
                        // cargar_datos_bar(idBLD, dato_actual, dato_base);
                        
                        
                    },
                    error: function(error) {
                        toastr.success('Se ha producido un error, contactar con los desarrolladores', '¡ERROR!');
                    }
                });
        
    });
});