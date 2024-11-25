$(document).ready(function(){
	show_project();
});
 function reset(){
    $("#category_form").trigger("reset");
    $("#submit").text("Save");
    $("#id").val("");
    $('#image').attr('src',siteUrl+'/uploads/default/default-image.jpg');
    $('#image1').attr('src',siteUrl+'/uploads/default/default-image.jpg');
    $('#image2').attr('src',siteUrl+'/uploads/default/default-image.jpg');
    show_project();
}   

$("#category_form").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
	$.ajax({ 
		type:"post",
		url:siteUrl + "/homepage/save",  
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

function show_project(){
    $('#cat_datatable').DataTable().destroy();
	var table = $('#cat_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"/homepage/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'heading', name: 'heading'},
            {data: 'sub_heading', name: 'sub_heading'},
            {data: 'category', name: 'category'},
            {data: 'image', name: 'image', orderable: false, searchable: false},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function deletes(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+"/homepage/delete",
            type:'GET',
            data:{id:id},
            success:function(response)
            {
               if(response.status_code==200){
                    toastr["success"](response.message);
                    $('#project_datatable').DataTable().destroy();
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
        url: siteUrl +"/homepage/edit",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#id").val(res.data.id); 
            $("#heading").html(res.data.heading);
            $("#category").val(res.data.cat_id);
            $("#subheading").val(res.data.sub_heading);
            $("#image").attr("src",res.data.banner);
            if (res.data.image1) {
                $("#image1").attr("src",res.data.image1);
            }
            if(res.data.image2){
                $("#image2").attr("src",res.data.image2);
            }
            $("#submit").text("Update");
            // reset();
            

        },
    });
}//end functtion

function status(id = "", status = "") {
    $.ajax({
        url: siteUrl +"/homepage/status",
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


$(function() {
    $("#file1").on('change',function() {
        $('#image1').attr('src','');
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
                
                    $('#image1').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[i]);
            }
        }
    });
});


$(function() {
    $("#file2").on('change',function() {
        $('#image2').attr('src','');
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
                
                    $('#image2').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[i]);
            }
        }
    });
});