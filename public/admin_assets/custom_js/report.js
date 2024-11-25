$(document).ready(function(){
	show_project();
});
 function reset(){
    $("#category_form").trigger("reset");
    $("#submit").text("Save");
    $("#id").val("");
    $('#image').attr('src',siteUrl+'/uploads/default/default-image.jpg');
    show_project();
}   

$("#question_form").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
	$.ajax({ 
		type:"post",
		url:siteUrl + "/save_report_question",  
		data:new FormData(this),
		processData: false, 
        contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
                $('#menu_div').show();
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
$("#menu_form").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }

    });
    $.ajax({ 
        type:"post",
        url:siteUrl + "/save_report_menu",  
        data:new FormData(this),
        processData: false, 
        contentType: false, 
        success:function(res){
            if(res.status_code == 200){
                toastr.success(res.message);
                $('#report_div').show();
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

$("#save_genrate_report").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }

    });
    $.ajax({ 
        type:"post",
        url:siteUrl + "/save_genrate_report",  
        data:new FormData(this),
        processData: false, 
        contentType: false, 
        success:function(res){
            if(res.status_code == 200){
                toastr.success(res.message);
                setTimeout(() => {
                    window.location.href = siteUrl + "/report_graph?id="+res.id;

                }, 1000);
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
        ajax: siteUrl+"/question/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function deletes(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+"/question/delete",
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
        url: siteUrl +"/question/edit",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#id").val(res.data.id); 
            $("#category").val(res.data.name);
            $("#commision").val(res.data.commision);
            $("#image").attr("src",res.data.image);
            $("#submit").text("Update");
            // reset();
            

        },
    });
}//end functtion

function status(id = "", status = "") {
    $.ajax({
        url: siteUrl +"/question/status",
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


$(".add_field_button").click(function(e){ 
    e.preventDefault();
    var question = $("#question").html();
    var html = '<div class="form-group col-lg-6"> <label for="question">question</label> <select class="form-control" name="question[]"> '+question+'</select> </div> <div class="form-group col-lg-4"> <label for="exampleInputEmail1">Answer</label> <input type="text" class="form-control" name="answer[]" id="answer" placeholder="Enter answer .."> </div><div class="col-md-2 mt-4 ap_data"> <button class="remove_field btn btn-danger btn-xs">-</button> </div>';
    $("#appendData").before(html);
});

$(document).on("click",".remove_field", function(e){ 
    e.preventDefault(); 
    $(this).parent().prev().remove();
    $(this).parent().prev().remove();
    $(this).parent().remove();
})