var infowindow;
    function closeInfoWindow(){
      if(infowindow !=null){
          infowindow.close();
      }
    }
  function initMap() {
    var current_cohort = $('select[name="cohort"] option:selected').text();
    var current_team;
    var coords = {
      lat: 14.628434,
      lng: -90.522713
    };

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: coords,
      styles: $.getJSON("../js/maperizer/map-style.json", function(json) {
          console.log(json);
      });
    });

    var c = {!! json_encode($coordinates->toArray()) !!};

    c.forEach(function(point){

      var marker = new google.maps.Marker({
        position: {
          lat: Number(point.latitude),
          lng: Number(point.longitude)
        },
        animation: google.maps.Animation.DROP,
        map: map
      });


      marker.addListener('click', function() {
        animateMapZoomTo(map, 15);
        map.setCenter(marker.getPosition());




        $.ajax({
            url: '/teams/name/'+point.team,
            type:"GET",
            dataType:"json",

            success:function(data) {
              var contentString;
              $.each(data, function(key, value){
                  contentString = '<div><p style="padding-bottom:0px; margin: 0px">Equipo: <strong>'+value.name+'</strong></p></div>';
                  console.log("NAME_TEAM: "+value.name);
                  current_team = value.name;
              });

              closeInfoWindow();

              infowindow = new google.maps.InfoWindow({
                content: contentString
              });

              infowindow.open(map, marker);

              test_func(point);
            }
        });

        document.getElementById("departament").selectedIndex = "1";
        $('select[name="departament"]').trigger("change");
        document.getElementById("departament").selectedIndex = "0";
        $("#teams option[value='"+point.team+"']").prop('selected', true);
        $('select[name="teams"]').parent().addClass('is-focused');
        openNav();

      });

    });

    /*c.forEach(function(point){
      console.log(point.team);
      console.log(point.latitude);
      console.log(point.longitude);
      console.log('------------');
    });*/


  function test_func(point){

    $.ajax({
        url: '/teams/location/'+point.team,
        type:"GET",
        dataType:"json",

        success:function(data) {
          $.each(data, function(key, value){
              $('#title').html(key + ", " + value);
          });
        },
    });

    $('#teamcohort').html("Equipo: " + current_team + " - " + current_cohort);

    $.get('/teams/info/'+point.team+'/'+current_cohort, function (data) {
        //success data
        console.log(data);
        $('table[id="list"]').empty();
        $('#nodata').html("");
        if(data.length == 0){
          $('#nodata').html('<i class="material-icons" style="font-size:36px;">remove_circle_outline</i></br>'+"No se encontraron resultados para esta cohorte.");
          $('#btn-dx').hide();
          $('#team-menu').hide();
        }else{
          $('#btn-dx').show();
          $('#team-menu').show();
          $('table[id="list"]').append('<thead><tr><th>Estudiante</th><th>Sede</th></tr></thead>');
          $('table[id="list"]').append('<tbody>');

          data.forEach(function(item){
              $('table[id="list"]').append('<tr onclick="showDetail('+item.id_student+')"><td>' + item.name + ' '+ item.fsurname + '</td><td>' + item.headquarter + '</td></tr>');
          });
          $('table[id="list"]').append('</tbody>');
        }

    });
  }

  $('select[name="departament"]').on('change', function(e){
      var depId = $(this).val();

      if(depId != 'ALL_DEPTS') {
        loadJSON(function(response) {
            var str = $('select[name="departament"] option:selected').text();
            var current_depto = str.substring(1,str.length);
            var data = JSON.parse(response);
            console.log(data[current_depto].name);
            console.log(data[current_depto].lat);
            console.log(data[current_depto].long);

            animateMapZoomTo(map, 10);
            map.panTo(new google.maps.LatLng(data[current_depto].lat, data[current_depto].long));
        });

          $.ajax({
              url: '/teams/get/'+depId,
              type:"GET",
              dataType:"json",

              success:function(data) {
                $('select[name="teams"]').empty();
                $('select[name="teams"]').append('<option></option>');
                $.each(data, function(key, value){
                    console.log('key: '+key+' val: '+value);
                    $('select[name="teams"]').append('<option value="'+ key +'">' + value + '</option>');
                  });
              },
          });
      } else {
          $('select[name="teams"]').empty();
          $('select[name="teams"]').append('<option></option>');
          var tm = {!! json_encode($teams->toArray()) !!};
          $.each(tm, function(key, value){
            $('select[name="teams"]').append('<option value="'+ key +'">' + value + '</option>');
          });
      }

      $('select[name="departament"]').blur();
    });


  $('select[name="teams"]').on('change', function(){

     var team_id = $(this).val();
     current_team = $('select[name="teams"] option:selected').text();

     function CallbackFunctionToFindTeamById(t) {
         return t.team == team_id;
     }

     current = c.find(CallbackFunctionToFindTeamById);

     if(current != null){
       animateMapZoomTo(map, 15);
       map.panTo(new google.maps.LatLng(current.latitude, current.longitude));

       test_func(current);
       openNav();
     }else{
       console.log("NO_DATA");
     }

     $('select[name="teams"]').blur();

  });


  $('select[name="cohort"]').on('change', function(){
    var team_id = $('select[name="teams"]').val();

     current_cohort = $('select[name="cohort"] option:selected').text();

     if(team_id != null){
       function CallbackFunctionToFindTeamById(t) {
           return t.team == team_id;
       }

       var current = c.find(CallbackFunctionToFindTeamById);
       if(current != null){
         test_func(current);
         openNav();
       }

     }

     $('select[name="cohort"]').blur();
  });


}

function loadJSON(callback) {
  var xobj = new XMLHttpRequest();
      xobj.overrideMimeType("application/json");
  xobj.open('GET', '/points.json', true);
  xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") {
          callback(xobj.responseText);
        }
  };
  xobj.send(null);
}

function show(){
 loadJSON(function(response) {
     var actual_JSON = JSON.parse(response);
     console.log(actual_JSON);
 });
}

function animateMapZoomTo(map, targetZoom) {
  var currentZoom = arguments[2] || map.getZoom();
  if (currentZoom != targetZoom) {
      google.maps.event.addListenerOnce(map, 'zoom_changed', function (event) {
          animateMapZoomTo(map, targetZoom, currentZoom + (targetZoom > currentZoom ? 1 : -1));
      });
      setTimeout(function(){ map.setZoom(currentZoom) }, 50);
  }
}
