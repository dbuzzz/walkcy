$(document).ready(function(){
	show_project();
    editor();
});
function editor(){

    var quill = new Quill('#editor', {
      modules: {
        toolbar: [
          [{ header: [1, 2, 3, 4, 5, 6,  false] }],
          ['bold', 'italic', 'underline','strike'],
          ['image', 'code-block'],
          ['link'],
          [{ 'script': 'sub'}, { 'script': 'super' }],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          ['clean']
        ]
      },
      placeholder: 'Location',
      theme: 'snow'  // or 'bubble'
    });

    var quill = new Quill('#editor1', {
      modules: {
        toolbar: [
          [{ header: [1, 2, 3, 4, 5, 6,  false] }],
          ['bold', 'italic', 'underline','strike'],
          ['image', 'code-block'],
          ['link'],
          [{ 'script': 'sub'}, { 'script': 'super' }],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          ['clean']
        ]
      },
      placeholder: 'Mail',
      theme: 'snow'  // or 'bubble'
    });

    var quill = new Quill('#editor2', {
      modules: {
        toolbar: [
          [{ header: [1, 2, 3, 4, 5, 6,  false] }],
          ['bold', 'italic', 'underline','strike'],
          ['image', 'code-block'],
          ['link'],
          [{ 'script': 'sub'}, { 'script': 'super' }],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          ['clean']
        ]
      },
      placeholder: 'Contact',
      theme: 'snow'  // or 'bubble'
    });

}
 function reset(){
    $("#category_form").trigger("reset");
    $("#editor").html("");
    $("#editor1").html("");
    $("#editor2").html("");
    editor();
    $("#submit").text("Save");
    $("#id").val("");
    show_project();
}   

$("#category_form").on("submit",function(e){

    var quill = new Quill('#editor');
    var editor_content = quill.root.innerHTML;

    var quill = new Quill('#editor1');
    var editor1_content = quill.root.innerHTML;

    var quill = new Quill('#editor2');
    var editor2_content = quill.root.innerHTML;
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });

  fd = new FormData(this);
   fd.append('location',editor_content);
   fd.append('mail',editor1_content);
   fd.append('contact',editor2_content);
	$.ajax({ 
		type:"post",
		url:siteUrl + "/contactpage/save",  
		data:fd,
		processData: false, 
        contentType: false, 
		success:function(res){
			if(res.status_code == 200){
				toastr.success(res.message);
                window.location.reload();
				
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
        ajax: siteUrl+"/contactpage/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'message', name: 'message'},
            {data: 'status', name: 'status', orderable: false, searchable: false},
        ]
    });
}

function deletes(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+"/contactpage/delete",
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
        url: siteUrl +"/contactpage/edit",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#id").val(res.data.id); 
            $("#editor2").html(res.data.contact);
            $("#editor").html(res.data.location);
            $("#editor1").html(res.data.mail);
            editor();
            $("#submit").text("Update");
            // reset();
            

        },
    });
}//end functtion

function status(id = "", status = "") {
    $.ajax({
        url: siteUrl +"/contactpage/status",
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

