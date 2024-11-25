function show_chats(id){
    $(".nav-item").removeClass("bg-info");
    $("#chat"+id).addClass("bg-info");
    $('#search').val('');
    $(".direct-chat-messages ul li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf('') > -1)
    });
    $("#count_chat"+id).remove();
        if (id) {
            // showLoader();
            $("tr.tr-active").removeClass("tr-active");
            $(this).addClass("tr-active");
            $.ajax({
                url: siteUrl + "/message/show_chat/" + id,
                success: function (result) {
                    $("#message_container").html(result);
                    $("#chat-app").animate({ scrollTop: $('#chat-app').height()+$(document).height()});
                },
            });
        }
    
}


$('#chat-app').scroll(function() {
    if($('#chat-app').scrollTop() == 0) {
        // var page_num = Number($("#page_num").val()) + 1;
        // var sender = $("#receiver_id").val();
        // var name = $("#sender_name").text();
        // var payload = {'sender':sender,'page_num':page_num,'limit_page':10};
        // getChats(sender,name,payload,true);
        // $("#page_num").val(page_num);
        console.log(1);
    }
});


$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".direct-chat-messages ul li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


$(document).on('submit','#chat_form',function(e){ 
      e.preventDefault();  
      $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl + '/message/send_chat',      
         type:'post',      
         data:new FormData(this),      
         dataType:'json', 
         contentType:false,
         processData: false,     
         success:function(response){ 
            if(response.status_code == 200){
               toastr["success"]("Message sent");
               show_chats($('#receiver_id').val());
               $('#chat_form').trigger('reset');
            }else if(response.status_code ==301){
               var dd = response.message ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }             
         },
      })
   });

function submit(obj){
    console.log($('#chat_form').serializeArray());
    id = $('#receiver_id').val();
    message = $('#message').val();
    $.ajaxSetup({
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
              });
      $.ajax({    
         url:siteUrl + '/message/send_chat',      
         type:'post',      
         data:{'id':id,'message':message},      
         success:function(response){ 
            if(response.status_code == 200){
               toastr["success"]("Message sent");
               show_chats($('#receiver_id').val());
               $('#chat_form').trigger('reset');
            }else if(response.status_code ==301){
               var dd = response.message ;
               for(var i=0; i<dd.length;i++){
                  toastr["error"](dd[i]);
               }
            }             
         },
      })
}

