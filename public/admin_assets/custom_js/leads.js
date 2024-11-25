$(document).ready(function(){
	showDatatable();
    showDatatables();
});
function reset(){
    $("#save_form").trigger("reset");
    $("#submit").text("Save");
    $("#id").val("");
    $('#image').attr('src',siteUrl+'/uploads/default/default-image.jpg');
    showDatatable();
}   

$("#save_form").on("submit",function(e){
    // showDatatable();
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
	$.ajax({ 
		type:"post",
		url:siteUrl + "/leads/save",  
		data:new FormData(this),
		processData: false, 
        contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
                reset();
			}else if(res.status_code == 301){
				$.each(res.message,function(key , value){
					toastr.warning(value);
				});
			}else if(res.status_code == 201){
				toastr.warning(res.message);
			}
		},error:function(e){
			console.log(e);		 
		}
	});
});

function showDatatable(agent = ''){
    $('#cat_datatable').DataTable().destroy();
	var table = $('#cat_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': siteUrl+"/leads/show",
            data: function(data) {
                data.agent = agent;
            }
        },
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'emails', name: 'emails'},
            {data: 'phone', name: 'phone'},
            {data: 'image', name: 'image', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'leadGenrated', name: 'leadGenrated', orderable: false, searchable: false},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function showDatatables(agent = ''){
    $('#cat_datatables').DataTable().destroy();
    var table = $('#cat_datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': siteUrl+"/attendance/viewAttendance",
            data: function(data) {
                data.agent = agent;
            }
        },
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'date', name: 'date', orderable: false, searchable: false},
        ]
    });
}
function filter(){
    showDatatables($('#filter_agent').val());
    showDatatable($('#filter_agent').val());
}

function deletes(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+"/leads/delete",
            type:'GET',
            data:{id:id},
            success:function(response)
            {
               if(response.status_code==200){
                    toastr["success"](response.message);
                    reset();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    reset();
                }
            }
        });
     }
} // End Of function


function edit(id = '') {
    $.ajax({
        url: siteUrl +"/leads/edit",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            // console.log(res.data);   
            $("#id").val(res.data.id); 
            $("#mobile").val(res.data.phone);
            $("#email").val(res.data.email);
            $("#agent").val(res.data.assigned_to);
            $("#submit").text("Update");
            // reset();
            

        },
    });
}//end functtion

function status(id = "", status = "") {
    $.ajax({
        url: siteUrl +"/leads/status",
        data: { id: id, status: status },
        type: "get",
        dataType: "json",
        success: function (response) {
            if(response.status_code==200){
                console.log(response.message);
                    toastr["success"](response.message);
                    reset();
                }else if(response.status==201){
                    toastr["error"](response.message);
                    reset();
                }
        },
    });
}

