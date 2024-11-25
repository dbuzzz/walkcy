$(document).ready(function(){
	showDatatable();
   $('#user').select2();
});
  

$("#save_form").on("submit",function(e){
    var editor_content = CKEDITOR.instances['editor1'].getData();
  
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
   fd = new FormData(this);
   fd.append('desc',editor_content);
	$.ajax({ 
		type:"post",
		url:siteUrl + "/community/save",  
		data:fd,
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

function showDatatable(){
    $('#cat_datatable').DataTable().destroy();
	var table = $('#cat_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"/community/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'descr', name: 'descr', orderable: false, searchable: false},
            {data: 'image', name: 'image', orderable: false, searchable: false},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function deletes(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+"/community/delete",
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
    $("input").prop('checked', false);
    $.ajax({
        url: siteUrl +"/community/edit",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#id").val(res.data.id); 
            $("#name").val(res.data.name);
            $("#editor1").html(res.data.description);
            // $("#user").val(res.data.user_id).trigger();
            $("#submit").text("Update");
            // showDatatable();
            

        },
    });
}//end functtion

function status(id = "", status = "") {
    $.ajax({
        url: siteUrl +"/community/status",
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


function reset(){
    $("#save_form").trigger("reset");
    $("#submit").text("Save");
    $("#id").val("");
    $('#image').attr('src',siteUrl+'/uploads/default/default-image.jpg');
     $('#addImages').html('<img style=" padding: 11px; width: 265px; height: 185px; " src="'+siteUrl+'/uploads/default/default-image.jpg">');
    showDatatable();
}

function show(id){
    $('#show'+id).show();
    $('#hide'+id).hide();
}function hide(id){
    $('#show'+id).hide();
    $('#hide'+id).show();
}

$(function() {
    $("#file").on('change',function() {
        $('#image').attr('src','');
        if (this.files && this.files[0]) {
            position = 0 ;
            const image_name = [];
            const image_type = [];
            
            for (var i = 0; i < this.files.length; i++) {
            var reader = new FileReader();
            
            
            image_name.push(this.files[i].name);
            image_type.push(this.files[i].type.split('/')[1]);
            
            console.log(image_type[position]);
            console.log(this.files.length);
            console.log(this.files[i].type.split('/')[1]);
            reader.onload = function(e) {
                
                    $('#image').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[i]);
            }
        }
    });
});
