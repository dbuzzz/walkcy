$(document).ready(function(){
	showDatatable();
});
function reset(){
    $("#save_form").trigger("reset");
    $("#submit").text("Save");
    $("#id").val("");
    $('#image').attr('src',siteUrl+'/uploads/default/default-image.jpg');
    showDatatable();
}  

$("#save_form").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
	$.ajax({ 
		type:"post",
		url:siteUrl + "/user-management/save",  
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

function showDatatable(){
    $('#cat_datatable').DataTable().destroy();
	var table = $('#cat_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"/user-management/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image', orderable: false, searchable: false},
            {data: 'image1', name: 'image', orderable: false, searchable: false},
            {data: 'image2', name: 'image', orderable: false, searchable: false},
            {data: 'image3', name: 'image', orderable: false, searchable: false},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function deletes(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+"/user-management/delete",
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
        url: siteUrl +"/user-management/edit",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            console.log(res.data.cat_id);   
            $("#id").val(res.data.id); 
            $("#name").val(res.data.name);
            $("#mobile").val(res.data.mobile);
            $("#email").val(res.data.email);
            $("#role").val(res.data.user_type);
            $("#image").attr("src",res.data.image);
            $("#submit").text("Update");
            // reset();
            

        },
    });
}//end functtion

function status(id = "", status = "") {
    $.ajax({
        url: siteUrl +"/user-management/status",
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

function view(id = '') {
     $.ajax({
        url: siteUrl + "view_modal",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#show_desc").html(res.description); 
            $("#show_title").html(res.title); 
            
            

        },
    });
}//end functtion


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