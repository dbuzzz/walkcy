$(document).ready(function(){
	showDatatable();
});
  

$("#save_forms").on("submit",function(e){
    e.preventDefault(); 
    $.ajaxSetup({
          headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
      });
     fd = new FormData(this);
      $.ajax({ 
          type:"post",
          url:siteUrl + "/product-management/save",  
          data:fd,
          processData: false, 
          contentType: false, 
          success:function(res){
              if(res.status_code == 200){
                  toastr.success(res.message);
                //   reset();
                  window.location.href = siteUrl+ "/product-management/view";
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
          ajax: siteUrl+"/product-management/show",
          columns: [ 
              {data: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
            //   {data: 'descr', name: 'descr', orderable: false, searchable: false},
            //   {data: 'descr2', name: 'descr2', orderable: false, searchable: false},
              {data: 'image', name: 'image', orderable: false, searchable: false},
            //   {data: 'permission', name: 'permission', orderable: false, searchable: false},
              {data: 'info2', name: 'info2', orderable: false, searchable: false},
              {data: 'status', name: 'status', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
  }
  
  function deletes(id = ''){
      if (confirm("Are you sure!")) {
          $.ajax({
              url:siteUrl+"/product-management/delete",
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
          url: siteUrl +"/product-management/edit",
          data: { id: id },
          type: 'GET',
          dataType: "json",
          success: function (res) {
              console.log(res);
              sub_cats(res.data.cat_id);
              $("#id").val(res.data.id); 
              $("#name").val(res.data.name);
              $("#brand").val(res.data.brand_id);
              $("#cat").val(res.data.cat_id);
              $("#sub_cat").val(res.data.sub_cat_id);
              $("#tax").val(res.data.tax_id);
              $("#qty").val(res.data.qty);
              $("#mrp").val(res.data.mrp);
              $("#price").val(res.data.price);
              $("#stock_warning").val(res.data.stock_warning);
              $("#desc").html(res.data.description);
              if (res.data.sale) {
                  $("#sale").prop('checked', true);
              }if (res.data.is_return) {
                  $("#return").prop('checked', true);
              }if (res.data.best_selling) {
                  $("#best_selling").prop('checked', true);
              }
              $("#image").attr("src",res.data.image);
              var img = res.data.path.split(',');
              var html = '';
              $.each(img, function(key,val) {
                  html += '<div class="p-2 col-lg-3"><img src=' + val + ' height="100px" width="100px"></div>';
              });
              console.log(html,img);
              $("#addImages").html(html);
              $("#submit").text("Update");
              // showDatatable();
              
  
          },
      });
  }//end functtion
  
  function status(id = "", status = "") {
      $.ajax({
          url: siteUrl +"/product-management/status",
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
      // 
      $.ajax({
          url: siteUrl +"/product-management/price_calc",
          data: { id: id},
          type: "get",
          dataType: "json",
          success: function (response) {
              if(response.status_code==200){
                  html = '';
                  $.each(response.message, function (key, val) {
                      html+= '<tr> <td colspan="2"><h4>'+val['variation']+'</h4></td> </tr> <tr> <td>Price</td> <td>'+val['price']+'</td> </tr> <tr> <td>Commision</td> <td>'+val['commision']+'</td> </tr> <tr> <td>You Get</td> <td>'+val['you_get']+'</td> </tr>';
                      // console.log(val['commision']);
                  });
              $('#add_table').html(html);
              $('#exampleModalCenter').modal('show');
              }else if(response.status==201){
                  toastr["error"](response.message);
              }
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
      $("#o_file").on('change',function() {
          $('#addImages').html('');
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
                  if (image_type[position] == 'pdf') {
                      $('#addImages').append('<div class="p-2"><img src=' + assetUrl +'icon_images/PDFs.png  height="100px" width="100px" class="remove" /><br><span>'+image_name[position]+'</span><div class="overlay"></div><div data-id='+position+' class="close_btn">X</div></div>');
              position++;
                  }else if (image_type[position] == 'dwg') {
                      $('#addImages').append('<div class="p-2"><img src=' + assetUrl +'icon_images/DWG.png  height="100px" width="100px" class="remove" /><br><span>'+image_name[position]+'</span><div class="overlay"></div><div data-id='+position+' class="close_btn">X</div></div>');
              position++;
                  }else if (image_type[position] == 'vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                      $('#addImages').append('<div class="p-2"><img src=' + assetUrl +'icon_images/Excell.png  height="100px" width="100px" class="remove" /><br><span>'+image_name[position]+'</span><div class="overlay"></div><div data-id='+position+' class="close_btn">X</div></div>');
              position++;
                  }else{
                      $('#addImages').append('<div class="p-2 col-lg-3"><img src=' + e.target.result + ' height="100px" width="100px" /><br><span>'+image_name[position]+'</span><div ></div></div>');
                      position++;
                  }
              }
              reader.readAsDataURL(this.files[i]);
              }
          }
      });
  });
  
  function sub_cats(id){
      if (id) {
          id = id;
      }else{
           id = $("#cat").val();
      }
     $.ajax({    
           url:siteUrl +'/product-management/sub_cat',      
           type:'get',      
           data:{'cat_id':id},      
           success:function(response){ 
              console.log(response);
              // var html = '<option value="">Select State</option>';
              var html = '';
              $.each(response, function(key,val) {
              html += '<option value="'+val.id+'">'+val.name+'</option>';
          });
              $("#sub_cat").html(html);
          
           },
        })
  }
  
  function reset(){
      $("#save_form").trigger("reset");
      $("#submit").text("Save");
      $("#id").val("");
      $("#appendData").html("");
      $(".bs-example-modal-lg").modal("hide");
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
  
  function show2(id){
      $('#show2'+id).show();
      $('#hide2'+id).hide();
  }function hide2(id){
      $('#show2'+id).hide();
      $('#hide2'+id).show();
  }
  
  i=2;
  $(".add_field_button").click(function(e){ 
      e.preventDefault();
      var html = '<div class="col-lg-12"><h3>Variant '+i+'</h3></div> <div class="form-group col-lg-3"><label>Variant</label> <input type="text" class="form-control" name="variant[]" placeholder="Enter variant .." /></div> <div class="form-group col-lg-3"><label>Quantity</label> <input type="number" class="form-control" name="qty[]" placeholder="Enter qty .." /></div> <div class="form-group col-lg-3"><label>Mrp</label> <input type="number" class="form-control" name="mrp[]" placeholder="Enter mrp .." "></div> <div class="form-group col-lg-3"><label>Price</label> <input type="number" class="form-control" name="price[]" placeholder="Enter price .." "></div> <div class="form-group col-lg-3"><label for="exampleInputEmail1">Color</label> <input type="color" class="form-control" name="color[]" id="color" placeholder="Enter color .." value="" /></div><div class="form-group col-lg-3"><label for="exampleInputEmail1">Image</label> <input type="file" class="form-control" name="variantImage[]" id="variantImage" placeholder="Enter variantImage .." value="" /></div> <div class="col-md-4 mt-4 ap_data"><button class="remove_field btn btn-danger btn-xs">-</button></div>';
      i++;
      $("#appendData").before(html);
  });
  
  $(document).on("click",".remove_field", function(e){ 
      e.preventDefault(); 
      $(this).parent().prev().remove();
      $(this).parent().prev().remove();
      $(this).parent().prev().remove();
      $(this).parent().prev().remove();
      $(this).parent().prev().remove();
      $(this).parent().prev().remove();
   
      $(this).parent().remove();
      i--;
  })
  
  $('#import_product').on('submit',function(e){ 
  
        e.preventDefault();  
        $.ajaxSetup({
                    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                });
  
      var allData = new FormData(this);
      console.log(allData);
      
        $.ajax({    
           url:siteUrl+'/product-management/import_product',      
           type:'post',      
           data:allData,      
           dataType:'json',
           processData: false, 
           contentType:false,    
           success:function(response){ 
              if(response.status == 1){
                 toastr["success"]("data imported");
                 // setTimeout( "redirect('/view_candidate_profile')",2000);      
              }else if(response.status==2){
                  toastr["error"]("email taken");
                 // var dd = response.error ;
                 // for(var i=0; i<dd.length;i++){
                 //    toastr["error"](dd[i]);
                 // }
              }else if(response.status == 3){
                 toastr["error"]("Make sure to name headers Properly");
              }            
           },
        })
     });