$(document).ready(function(){
	show_project();
});
 function reset(){
    $("#question_form").trigger("reset");
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
		url:siteUrl + "/survey/save",  
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

$(".add_field_button").click(function(e){ 
    e.preventDefault();
    var question = $("#question").html();
    var html = '<div class="form-group col-lg-6"> <label for="question">question</label> <select class="form-control" name="question[]"> '+question+'</select> </div> <div class="form-group col-lg-4"> <label for="exampleInputEmail1">Answer</label> <input type="text" class="form-control" name="answer[]" id="answer" placeholder="Enter answer .."> </div><div class="col-md-2 mt-4 ap_data"> <button class="remove_field btn btn-danger btn-xs">-</button> </div>';
    $("#appendData").before(html);
});

$("#send_otp").click(function(e){ 
    e.preventDefault();
    $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
    $.ajax({ 
        type:"post",
        url:siteUrl + "/survey/send_otp",  
        data:{'mobile':$('#mobile').val()},
        success:function(res){
            if(res.status_code == 200){
                toastr.success(res.message);
                $('#id').val(res.id);
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
        ajax: siteUrl+"/survey/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'survey_by', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

$(document).on("click",".remove_field", function(e){ 
    e.preventDefault(); 
    $(this).parent().prev().remove();
    $(this).parent().prev().remove();
    $(this).parent().remove();
})