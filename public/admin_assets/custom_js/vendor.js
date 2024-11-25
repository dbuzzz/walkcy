$(document).ready(function(){
	showDatatable();
    $('#department').select2();
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
		url:siteUrl + "/vendor-management/save",  
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
        ajax: siteUrl+"/vendor-management/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'emp_code', name: 'emp_code'},
            {data: 'department', name: 'department'},
            {data: 'image', name: 'image', orderable: false, searchable: false},
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
            url:siteUrl+"/vendor-management/delete",
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
        url: siteUrl +"/vendor-management/edit",
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
        url: siteUrl +"/vendor-management/status",
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

i=1;
$(".add_field_button").click(function(e){ 
    e.preventDefault();
    var cat = $("#cat").html();
    var html = '<div class="col-md-5 mb-3 ap_data"><label for="cat">Category</label> <select required  class="form-control" name="cat[]" id="cat'+i+'">'+cat+' </select> </div> <div class="col-md-5 mb-3 ap_data"> <label for="exampleInputEmail1">commision</label><input required type="number"class="form-control"name="commision[]" id="commision'+i+'" placeholder="Enter commision .."> </div><div class="col-md-2 mt-4 ap_data"> <button class="remove_field btn btn-danger btn-xs">-</button> </div>';
    i++;
    $("#appendData").before(html);
});

$(document).on("click",".remove_field", function(e){ 
    e.preventDefault(); 
    $(this).parent().prev().remove();
    $(this).parent().prev().remove();
    $(this).parent().remove();
})