/*
 *
 *   Notifications for Mie Platform - Carlos Paiz
 *   version 0.1
 *
 */

var _token = $('meta[name="_token"]').attr('content');
var notification_counter = document.getElementById("notify-counter");
var notification_list = document.getElementById('notify-list');
var notification_popup = document.getElementById('popup');
var how_many_notifications = 0;
var __link_to_user = '';

function notify(url,title,description,message,emisor,receptor,link,type){

  $.ajax({
    type: 'post',
    url: url,
    data: {
      '_token': _token,
      'title': title,
      'description': description,
      'message': message,
      'email_emisor': emisor,
      'email_receptor' : receptor,
      'link' : link,
      'type' : type
    },
    success: function(data) {
      (data.errors)?console.log('ERROR_TO_SEND_NOTIFICATION'):console.log('SUCCESS_TO_SEND_NOTIFICATION');
    },
  });

}

function getNotificationsForUser(link_to_user){
  __link_to_user = link_to_user;
  $.get(link_to_user, function (data) {
    notification_list.innerHTML = '';
    moment.locale('es');

    if(data.length === 0){
      notification_counter.style.display = "none";
      notification_list.innerHTML += '<li><div class="text-center link-block"><strong>No tienes notificaciones nuevas</strong></div></li>';
    }else{
      data.forEach(function(data){
        var relative_time = moment(data.updated_at,'YYYY-MM-DD HH:mm:ss');
        if(data.type == '1'){
          notification_popup.innerHTML = '<h1 style="font-weight:bold;">'+data.description+'</h1><br><textarea style="font-size:16px;border:0;resize:none;width:100%;outline:none;box-shadow:none !important;" rows="10" readonly>'+data.message+'</textarea><br><button type="button" class="cool-button hvr-grow" onclick="remove('+data.id+')">Enterado</button>';
          notification_popup.style.display = 'block';
        }else{
          if(data.seen == 0){
            notification_list.innerHTML += '<li><a href="'+data.link+'" onclick="seen('+data.id+')"><div><strong>'+data.title+'</strong> '+data.description+' <span class=" text-muted small"> - '+relative_time.fromNow()+'</span></div></a></li><li class="divider"></li>';
            how_many_notifications += 1;
          }
          //notification_list.innerHTML += '<li><a href="'+data.link+'" onclick="seen(\''+link_to_user+'\','+data.id+')"><div><strong>'+data.title+'</strong> '+data.description+' <span class=" text-muted small"> - '+relative_time.fromNow()+'</span></div></a></li><li class="divider"></li>';
        }
      });

      notification_list.innerHTML += '<li><div class="text-center link-block"><strong>Es todo por ahora.</strong></div></li>';
      notification_counter.style.display = "block";
      (how_many_notifications == 0)?notification_counter.style.display = "none":notification_counter.innerHTML = how_many_notifications;

      if(data.length > 6){
        notification_list.style.height = "500px";
      }
    }
  });

}

function seen(id){
  $.ajax({
      type: 'post',
      url: __link_to_user + '/' + id,
      data: {
          '_token': _token,
          'id': id,
          'status': 1
      },
      success: function(data) {
          if (data.errors) {
              console.log('ERROR_UPD_NOTIFICATION_STATUS');
          } else {
              console.log('SUCCESS_UPD_NOTIFICATION_STATUS');
              how_many_notifications -= 1;
              (how_many_notifications == 0)?notification_counter.style.display = "none":notification_counter.innerHTML = how_many_notifications;
          }
      },
  });
}

function remove(id){
  $.ajax({
      type: 'post',
      url: __link_to_user + '/delete/' + id,
      data: {
          '_token': _token,
          'id': id
      },
      success: function(data) {
          if (data.errors) {
              console.log('ERROR_TO REMOVE_NOTIFICATION');
          } else {
              console.log('NOTIFICATION_WAS_REMOVED');
              notification_popup.style.display = 'none';
              //how_many_notifications -= 1;
              //(how_many_notifications == 0)?notification_counter.style.display = "none":notification_counter.innerHTML = how_many_notifications;
          }
      },
  });
}
