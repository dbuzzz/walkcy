$('#event_label').select2();

$(".clickable").click(function(){
    $(".clickable").removeClass("active");
    var color = $(this).attr("data-color");
    $(this).toggleClass("active");
    $('#color').val(color);
});

var Calendar = FullCalendar.Calendar;

var checkbox = document.getElementById('drop-remove');
var calendarEl = document.getElementById('calendara');
set();

// //function of get input field on change 
// $(document).on('click','#specific_member',function(){
//     alert('ok')
//                 var html = '<div class="form-group col-12">';
//                     html += ' <p class="m-1"></p><input type="text" class="form-control" placeholder="Enter">';
//                 html +='</div>';
//                 $('#set').html(html);
    
// });

// //function of get input field on click checkbox
// $(document).on('click','#checkbox',function(){
//     if ($('#checkbox').is(':checked')) {
//                 var html = '<div class="form-group col-12">';
//                     html += ' <p class="m-1"></p><input type="text" class="form-control" placeholder="Enter">';
//                 html +='</div>';
//                 $('#set-inputs').html(html);
//     }else{
//        $('#set-inputs').remove();
//     }
// });

// function of save sub contractor
$('#add_event').on('submit', function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
   
    $.ajax({
        url: siteUrl + 'event/create',
        type: 'post',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(response) {
            if (response.status_code == 200) {
                clearForm();
               set(response.data);
                
            } else if (response.status_code == 301) {
                $.each(response.message, function(k, v) {
                    toastr["error"](v);
                })
            } else if (response.status_code == 201) {
                toastr["error"](response.message);
            }
        },
    })
});



// function of save sub contractor
$('#btn_delete').on('click', function(e) {
        if (confirm("Are you sure!")) {

    e.preventDefault();
    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
   
    $.ajax({
        url: siteUrl + 'event/delete',
        type: 'post',
        data: {'id':$("#id").val()},
        dataType: 'json',
        success: function(response) {
            if (response.status_code == 200) {
                clearForm();
                set(response.data);
                
            } else if (response.status_code == 301) {
                $.each(response.message, function(k, v) {
                    toastr["error"](v);
                })
            } else if (response.status_code == 201) {
                toastr["error"](response.message);
            }
        },
    })
}
});
function show_modal(){
   $("#event_modal").show();
}


$('#event_modal').on('hidden.bs.modal', function () {
    setForm();
    $("#add_event").show();
})

function clearForm(){
    $('#event_modal').trigger('reset');
    $('#id').val('');
    $('#btn_add').html('<i class="fa fa-check-circle"></i> Add');
    closeAjaxModal(true);
}

function closeAjaxModal(success) {
    if (success) {
        $("#add_event").hide();
        $(".modal-mask").html("<div class='circle-done'><i class='fa fa-check'></i></div>");
        $('#btn_add').attr('type','button');
        $('#btn_add').addClass('disabled');
        setTimeout(function () {
            $(".modal-mask").find('.circle-done').addClass('ok');
        }, 30);
    }
    setTimeout(function () {
        $(".modal-mask").empty();
        $("#event_modal").modal('toggle');
    }, 1000);
}

function setForm(){
    $('#add_event').trigger('reset');
    $('#id').val('');
    $('#btn_add').html('<i class="fa fa-check-circle"></i> Add');
    $('#btn_add').attr('type','submit');
    $('#btn_add').removeClass('disabled'); 
}


function set(argument = '') {
    if (argument) {
    console.log(argument);
        event_data = argument;
    }else{
        event_data = EventData;
    }
    dsa = [];   
     $(JSON.parse(event_data)).each(function(key,val) {
        dsa[key] =  {
          title          : val['title'],
          id             : val['id'],
          start          : new Date(val['start']),
          end            : new Date(val['end']),
          allDay         : false,
          backgroundColor: val['color'],
          borderColor    : val['color'],         
      }

        });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      eventClick: function(calEvent, jsEvent, view) {
        edit_event(calEvent.event.id);
        },
      themeSystem: 'bootstrap',

      events: dsa,

      editable  : false,
      drop      : function(info) {
        if (checkbox.checked) {
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    calendar.refetchEvents();
}

function edit_event(id){
     $("#event_modal").modal('toggle');

     $.ajaxSetup({
        headers: { "X-CSRF-Token": $("meta[name=_token]").attr("content") },
    });
    $.ajax({
        url: siteUrl + "event/edit",
        data: { id: id },
        type: "post",
        dataType: "json",
        success: function (response) {
            if (response.status_code == 200) {
                console.log(response);
                $("#id").val(response.data.id);
                $("#title").val(response.data.title);
                $("#description").html(response.data.description);
                $("#start_date").val(response.data.start_date);
                $("#start_time").val(response.data.start_time);
                $("#end_date").val(response.data.end_date);
                $("#end_time").val(response.data.end_time);
                $("#location").val(response.data.location);
                $("#event_label").val(response.data.labels);
                $("#client").val(response.data.client_id);
                $("#btn_add").html('<i class="fa fa-check-circle"></i> Update');
                $("#btn_delete").show();
            } else {
                console.log(response.message);
            }
        },
    });
}
   
