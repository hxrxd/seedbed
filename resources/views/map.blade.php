<!DOCTYPE html>
<html>

<head>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/style.css')!!}


    {!!Html::style('font-awesome-old/css/font-awesome.css')!!}
    {!! HTML::script('js/jquery-3.1.1.min.js'); !!}

    {!! HTML::script('mapbox/js/mapbox.js'); !!}
   



    {!!Html::style('https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css')!!}

    {!!Html::style('mapbox/css/font-awesome.min.css')!!}

    <!--fin de Auto-localizacion-->
    <!--Plugins para pintar markers -->
    {!!Html::style('mapbox/css/leaflet.draw.css')!!}

    {!! HTML::script('mapbox/js/leaflet.draw.js'); !!}

   
    <!--Control de maximizar pantalla -->
    {!! HTML::script('https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'); !!}
   
    {!!Html::style('https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css')!!}


    <!--<script src='../mapbox/js/Leaflet.fullscreen.min.js'></script>
    <link href='../mapbox/css/leaflet.fullscreen.css' rel='stylesheet' />-->
    {!! HTML::script('mapbox/js/leaflet-pip.js'); !!}

</head>
<body>
    <div id="loader"></div>
    <div id='legend' style='display:none;'>
        <h1><strong>Información básica</strong></h1>
        <h2>Cada marcador <i class="fa fa-map-marker"></i> representa la ubicación georeferencial del palacio municipal.</h2>
        <nav class='legend clearfix'>
            <span style='background:#02556e;'></span>
            <span style='background:#95b1c2;'></span>
            <span style='background:#2ebeef;'></span>
            <span style='background:#abe1fa;'></span>
            <span style='background:#a03522;'></span>
            <span style='background:#d6acaa;'></span>
            <span style='background:#f68628;'></span>
            <span style='background:#fdcdab;'></span>
            <span style='background:#333132;'></span>
            <h3><label>Al presionar sobre el marcador <i class="fa fa-map-marker"></i> presentará información básica del municipio, además de un botón que redireccionará a una vista con la información completa</label></h3>
        </nav>
           <h3> <i class="fa fa-bar-chart"></i>  <a href="#link to source"> Ir a indicadores</a></h3>
           <h3> <i class="fa fa-home"></i>  <a href="#link to source"> Ir a Página inicial</a></h3>
    </div>
    <div id='map' class="center-block" style="width: 100%; height: 100%"></div>
    <div style="display:none" id="loader-modal"></div>
<footer>
    <style>
		.legend span {
		display:block;
		float:left;
		height:15px;
		width:11%;
		text-align:center;
		font-size:9px;
		color:#808080;
		}
        /* unvisited link */
        a:link {
        color: black;
        }

        /* visited link */
        a:visited {
        color: black;
        }

        /* mouse over link */
        a:hover {
        color: black;
        }

        /* selected link */
        a:active {
        color: black;
        }
        /*for loading*/
        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            margin-top:210px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }

        #frame {
            display: none;
            text-align: center;
        }
	</style>
    <link href='font-awesome/css/font-awesome.css' rel='stylesheet'/>
    <script src='js/jquery-3.1.1.min.js'></script>
    <script>
        var interval = setInterval(function() {
            if(document.readyState === 'complete'){
            clearInterval(interval);
            console.log('DONE!');
            document.getElementById("loader").style.display = "none";
            $('#frame').fadeIn('slow');
            }
        }, 500);
        var mark;
        L.mapbox.accessToken = 'pk.eyJ1IjoicHJvZ3JhbWFlcHN1bSIsImEiOiJjbDFreGpjemgwNTljM2lzOTFmc21hOG51In0.9ErCrEo2SxIeGrVZc4weMQ';
        var map = L.mapbox.map('map')
                .setView([15.783471,-90.230759],8)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/satellite-streets-v12'));
                console.log(window.location.host);
        jQuery.ajax({
            dataType: 'json',
            success: function load(d) {
                //console.log(d);
                //alert(d);
                var myStyle = {
                    "color": "#31B404",
                    "weight": 5,
                    "opacity": 0.65
                };
                var states = L.geoJson(d,  {
                    style: myStyle
                }).addTo(map);
            }
        });
        
        map.legendControl.addLegend(document.getElementById('legend').innerHTML);
        L.control.fullscreen().addTo(map);
        map.attributionControl.setPosition('bottomleft');
        var featureGroup = L.featureGroup().addTo(map);

    </script>	
    
</footer>
<body>
</html>
