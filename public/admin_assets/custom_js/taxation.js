$(document).ready(function(){
	dataTable();
});
function reset(){
    $("#save_form").trigger("reset");
    $("#submit").text("Save");
    $("#id").val("");
    dataTable();
}    

$("#save_form").on("submit",function(e){
  e.preventDefault(); 
  $.ajaxSetup({
        headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
    });
	$.ajax({ 
		type:"post",
		url:siteUrl + "/taxation/save",  
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

function dataTable(){
    $('#cat_datatable').DataTable().destroy();
	var table = $('#cat_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: siteUrl+"/taxation/show",
        columns: [ 
            {data: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            // {data: 'ref_name', name: 'ref_name'},
            {data: 'value', name: 'value', orderable: false, searchable: false},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}

function deletes(id = ''){
    if (confirm("Are you sure!")) {
        $.ajax({
            url:siteUrl+"/taxation/delete",
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
        url: siteUrl +"/taxation/edit",
        data: { id: id },
        type: 'GET',
        dataType: "json",
        success: function (res) {
            $("#id").val(res.data.id); 
            $("#name").val(res.data.name);
            $("#value").val(res.data.value);
            $("#v_number").val(res.data.v_number);
            $("#variant").val(res.data.variant);
            $("#make").val(res.data.make);
            $("#model").val(res.data.model);
            $("#policy").val(res.data.policy);
            $("#payment").val(res.data.payment);
            $("#mobile").val(res.data.mobile);
            $("#premium").val(res.data.premium);
            $("#od_premium").val(res.data.od_premium);
            $("#od_premium_val").val(res.data.od_premium_val);
            $("#od_premium_payout").val(res.data.od_premium_payout);
            $("#net_premium").val(res.data.net_premium);
            $("#net_premium_val").val(res.data.net_premium_val);
            $("#net_premium_payout").val(res.data.net_premium_payout);
            $("#tp_premium").val(res.data.tp_premium);
            $("#tp_premium_val").val(res.data.tp_premium_val);
            $("#tp_premium_payout").val(res.data.tp_premium_payout);
            $("#start_date").val(res.data.start_date);
            $("#end_date").val(res.data.end_date);
            $("#company").val(res.data.company);
            $("#portal").val(res.data.portal);
            $("#submit").text("Update");
            // reset();
            

        },
    });
}//end functtion

function status(id = "", status = "") {
    $.ajax({
        url: siteUrl +"/taxation/status",
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

// function net_wise_calc(obj){
    
//     val = $('#payout').val();
//     perc =(100 * obj.value) / val;
//     html = '<span class="badge badge-pill badge-dark pt-2">'+perc.toFixed(1)+'%</span>'
//     $('#'+obj.id+'_val').html(html);
// }

// function premium_calc(obj){
    
//     val2 = $('#premium').val();
//     perc =(100 * obj.value) / val2;
//     html = '<span class="badge badge-pill badge-dark pt-2">'+perc.toFixed(1)+'%</span>'
//     $('#'+obj.id+'_val').html(html);
// }

function od_premium_check(){
    if ($('#md_checkbox_23').val() == 1) {
        $('#md_checkbox_23').val(2);
        $('#od_premium').attr('readonly',false);
        $('#od_premium_val').attr('readonly',false);
        $('#od_premium_payout').attr('readonly',false);
    }else{
        $('#md_checkbox_23').val(1);
        $('#od_premium').attr('readonly',true);
        $('#od_premium_val').attr('readonly',true);
        $('#od_premium_payout').attr('readonly',true);
    }
    
}

function net_premium_check(){
    if ($('#md_checkbox_231').val() == 1) {
        $('#md_checkbox_231').val(2);
        $('#net_premium').attr('readonly',false);
        $('#net_premium_val').attr('readonly',false);
        $('#net_premium_payout').attr('readonly',false);
    }else{
        $('#md_checkbox_231').val(1);
        $('#net_premium').attr('readonly',true);
        $('#net_premium_val').attr('readonly',true);
        $('#net_premium_payout').attr('readonly',true);
    }
    
}
function tp_premium_check(){
    if ($('#md_checkbox_232').val() == 1) {
        $('#md_checkbox_232').val(2);
        $('#tp_premium').attr('readonly',false);
        $('#tp_premium_val').attr('readonly',false);
        $('#tp_premium_payout').attr('readonly',false);
    }else{
        $('#md_checkbox_232').val(1);
        $('#tp_premium').attr('readonly',true);
        $('#tp_premium_val').attr('readonly',true);
        $('#tp_premium_payout').attr('readonly',true);
    }
    
}

function od_premium_calc(obj){
    var val = $('#od_premium').val();
    var per_val = $('#od_premium_val').val();
    var perc =(Number(val) * Number(per_val)/100) ;
    $('#od_premium_payout').val(perc);

    // var val1 = $('#od_premium').val();
    // var val2 = $('#net_premium').val();
    // var val3 = $('#tp_premium').val();
    var val1 = '';
    var val2 = '';
    var val3 = '';
    var val4 = $('#od_premium_payout').val();
    var val5 = $('#net_premium_payout').val();
    var val6 = $('#tp_premium_payout').val();
    var sum = (Number(val1)+Number(val2)+Number(val3)+Number(val4)+Number(val5)+Number(val6))
    $('#premium').val(sum);
}
function net_premium_calc(obj){
    var val = $('#net_premium').val();
    var per_val = $('#net_premium_val').val();
    var perc =(Number(val) * Number(per_val)/100) ;
    $('#net_premium_payout').val(perc);

    // var val1 = $('#od_premium').val();
    // var val2 = $('#net_premium').val();
    // var val3 = $('#tp_premium').val();
    var val1 = '';
    var val2 = '';
    var val3 = '';
    var val4 = $('#od_premium_payout').val();
    var val5 = $('#net_premium_payout').val();
    var val6 = $('#tp_premium_payout').val();
    var sum = (Number(val1)+Number(val2)+Number(val3)+Number(val4)+Number(val5)+Number(val6))
    $('#premium').val(sum);
}
function tp_premium_calc(obj){
    var val = $('#tp_premium').val();
    var per_val = $('#tp_premium_val').val();
    var perc =(Number(val) * Number(per_val)/100) ;
    $('#tp_premium_payout').val(perc);

    // var val1 = $('#od_premium').val();
    // var val2 = $('#net_premium').val();
    // var val3 = $('#tp_premium').val();
    var val1 = '';
    var val2 = '';
    var val3 = '';
    var val4 = $('#od_premium_payout').val();
    var val5 = $('#net_premium_payout').val();
    var val6 = $('#tp_premium_payout').val();
    var sum = (Number(val1)+Number(val2)+Number(val3)+Number(val4)+Number(val5)+Number(val6))
    $('#premium').val(sum);
}

