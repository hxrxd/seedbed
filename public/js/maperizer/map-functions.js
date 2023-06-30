var status = 0;
var welcome_msg_status = 1;
var nav_status = 0;
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    panel.style.backgroundColor = "transparent";

    if(panel.style.maxHeight){
      this.style.backgroundColor = "transparent";
      panel.style.maxHeight = null;
    }else{
      this.style.backgroundColor = "#2ebeef";
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

//init welcome message for desktop

if($(window).width() >= 768){
  document.getElementById("wmsg").innerHTML = "Mira todas las sedes de EPSUM y consulta la información de los equipos distribuidos en todo el país. Accede a información pública como diagnósticos comunitarios e informes de los proyectos realizados.</br></br>En el panel de la izquierda, selecciona una cohorte, el lugar y el equipo que quieras ver. ¡También puedes desplazarte por el mapa y seleccionar cualquier marcador!"
  document.getElementById("wtitle").style.fontFamily = "'Titillium Web', sans-serif";
  document.getElementById("wtitle").style.fontSize = "36px";
  document.getElementById("wtitle").style.Color = "#02556e";
  document.getElementById("wtitle").style.paddingTop = "80px";
}

function openNav() {
  if($(window).width() >= 768){

    if(welcome_msg_status == 1){
      closeWelcomeMessage();
    }

    document.getElementById("mySidenav").style.width = "30%";
    document.getElementById("map").style.marginLeft = "55%";
    document.getElementById("map").style.width = "45%";
  }else if($(window).width() > 319 && $(window).width() < 768){
    status = 0;

    if(welcome_msg_status == 1){
      closeWelcomeMessage();
    }

    document.getElementById("search-pane").style.height = "0";
    document.getElementById("mySidenav").style.height = "60%";
    document.getElementById("map").style.marginTop = "71px";
    document.getElementById("map").style.height = "30%";
    document.getElementById("bottombar").style.height = "0";
  }
}

function closeNav() {
  if($(window).width() >= 768){
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("map").style.marginLeft= "25%";
    document.getElementById("map").style.width = "75%";
  }else if($(window).width() > 319 && $(window).width() < 768){
    if(status == 0){
      document.getElementById("mySidenav").style.height = "0";
      document.getElementById("map").style.height = "65%";
      document.getElementById("bottombar").style.height = "25%";
    }
  }
}

function showDetail(id){  
  $.get('{{asset("teams/student/id")}}'.replace("id",id), function (data) {
    $('#surnames').html(data[0].fsurname + ' ' + data[0].ssurname);
    $('#names').html(data[0].name);
    $('#department').html(data[0].municipality + ', ' + data[0].departament);
    //$('#municipality').html(data[0].municipality);
    $('#carne').html(data[0].carne);
    $('#career').html(data[0].career);
    $('#academicu').html(data[0].academicu);
    $('#practice').html(data[0].practice);
    $('#cohort').html(data[0].cohort);
    $('#team').html(data[0].team);
    $('#headquarter').html(data[0].headquarter);
    $('#initdate').html(data[0].initd);
    $('#finishdate').html(data[0].endd);
    $('#financing').html(data[0].financing);
  });

  if($(window).width() >= 768){
    document.getElementById("navDetail").style.width = "30%";
  }else if($(window).width() > 319 && $(window).width() < 768){
    document.getElementById("navDetail").style.height = "90%";
  }

  status = 2;
}

function hideDetail(){
  if($(window).width() >= 768){
    document.getElementById("navDetail").style.width = "0";
  }else if($(window).width() > 319 && $(window).width() < 768){
    document.getElementById("navDetail").style.height = "0";
    status = 0;
  }
}

/* for mobile */

function showMenu() {
  closeNav();

  if(welcome_msg_status == 1){
    closeWelcomeMessage();
  }

  if(status == 0){
    document.getElementById("search-pane").style.height = "45%";
    document.getElementById("map").style.marginTop = "80%";
    document.getElementById("map").style.height = "60%";
    document.getElementById("bottombar").style.height = "0";
    status = 1;
  }else if(status == 2){
    hideDetail();
  }else{
    document.getElementById("search-pane").style.height = "0";
    document.getElementById("map").style.marginTop = "71px";
    document.getElementById("map").style.height = "65%";
    document.getElementById("bottombar").style.height = "25%";
    status = 0;
  }
}

function swipeUp() {
  if($(window).width() > 319 && $(window).width() < 768){
    document.getElementById("mySidenav").style.height = "90%";
    document.getElementById("map").style.marginTop = "71px";
    document.getElementById("map").style.height = "0";
  }
}

function showSnackbar(message) {
  document.getElementById("snackbar").innerHTML = message;
  document.getElementById("snackbar").style.height = "56px";
  document.getElementById("snackbar").style.verticalAlign = "middle";
  document.getElementById("snackbar").style.lineHeight = "56px";
  setTimeout(function(){
    document.getElementById("snackbar").style.height = "0";
  }, 3000);
}

function closeWelcomeMessage(){
  if($(window).width() >= 768){
    document.getElementById("welcome").style.opacity = "0";
  }else if($(window).width() > 319 && $(window).width() < 768){
    document.getElementById("welcome").style.bottom = "-52%";
  }
  setTimeout(function(){
    document.getElementById("welcome").style.display = "none";
    welcome_msg_status = 0;
  }, 1000);
}
