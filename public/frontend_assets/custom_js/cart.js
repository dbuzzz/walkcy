$(document).ready(function() {
    
   count_cart();
   count_wishlist();
});
$('#place_order').on('submit',function(e){
console.log(1); 
     e.preventDefault();  
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/place_orders',      
        type:'post',      
        data:new FormData(this),      
        dataType:'json', 
        contentType:false,
        processData: false,    
        success:function(response){ 
           if(response.status == 1){
              toastr["success"]("Order Placed");
               setTimeout( location.reload(),2000);        
           }else if(response.status==2){
              var dd = response.error ;
              for(var i=0; i<dd.length;i++){
                 toastr["error"](dd[i]);
              }
           }else if(response.status == 3){
              toastr["error"]("Couldn't Place Right Now");
           }
           // else if(response.status == 4){
           //    toastr["success"]("data Updated");
           //    setTimeout( "redirect(siteUrl +'/view_product')",2000);  
           // }             
        },
     })
  });


$('#contact_form').on('submit',function(e){
     e.preventDefault();  
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/add_contact',      
        type:'post',      
        data:new FormData(this),      
        dataType:'json', 
        contentType:false,
        processData: false,    
        success:function(response){ 
           if(response.status == 1){
              toastr["success"]("We Will contact You Soon");
               setTimeout( location.reload(),5000);        
           }else if(response.status==2){
              var dd = response.error ;
              for(var i=0; i<dd.length;i++){
                 toastr["error"](dd[i]);
              }
           }else if(response.status == 3){
              toastr["error"]("Couldn't Contact");
           }
           // else if(response.status == 4){
           //    toastr["success"]("data Updated");
           //    setTimeout( "redirect(siteUrl +'/view_product')",2000);  
           // }             
        },
     })
  });

$('#review_form').on('submit',function(e){
     e.preventDefault();  
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/save_review',      
        type:'post',      
        data:new FormData(this),      
        dataType:'json', 
        contentType:false,
        processData: false,    
        success:function(response){ 
         console.log(response);
           if(response.status_code == 200){
              toastr["success"]("Review Added");
               setTimeout( location.reload(),5000);        
           }else if(response.status_code == 301){
              var dd = response.message ;
              for(var i=0; i<dd.length;i++){
                 toastr["warning"](dd[i]);
              }
           }else if(response.status == 3){
              toastr["error"]("Couldn't Connect");
           }
           // else if(response.status == 4){
           //    toastr["success"]("data Updated");
           //    setTimeout( "redirect(siteUrl +'/view_product')",2000);  
           // }             
        },
     })
  });
variant_id = '';
function variant_store(id){
  variant_id = id;
  $(".variant").css("background-color", "");
  $(".variant").css("color", "");
  $(".variant_price").hide();

  $("#variant"+id).css("background-color", "#679509");
  $("#variant"+id).css("color", "#fff");
  $("#variant_price"+id).show();
}


function add_cart(id,type=''){
//   console.log(variant_id);
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/cart',      
        type:'post',      
        data:{'id':id,'variant_id':variant_id,},      
        dataType:'json', 
        success:function(response){ 
           if(response.status == 1){
              $('.cart_count').html(response.count);
              toastr["success"]("Added To Cart");
              cart_item();
              if (type == 1) {
                  window.location.href =  siteUrl +'/cart-page';
              }
               // setTimeout( "redirect(siteUrl +'/view_product')",2000);        
           }else if(response.status==2){
              var dd = response.error ;
              for(var i=0; i<dd.length;i++){
                 toastr["error"](dd[i]);
              }
           }else if(response.status == 3){
              toastr["error"]("Couldn't insert right now");
           }else if(response.status == 4){
              toastr["success"]("data Updated");
              // setTimeout( "redirect(siteUrl +'/view_product')",2000);  
           }             
        },
     })
}

function add_wishlist(id){
  console.log(variant_id);
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/add_wishlist',      
        type:'post',      
        data:{'id':id},      
        dataType:'json', 
        success:function(response){ 
           if(response.status == 1){
              $('.wishlist_count').html(response.count);
              toastr["success"]("Added To wishlist");
           }else if(response.status==2){
              var dd = response.error ;
              for(var i=0; i<dd.length;i++){
                 toastr["error"](dd[i]);
              }
           }else if(response.status == 3){
              toastr["error"]("Couldn't insert right now");
           }else if(response.status == 4){
              toastr["success"]("Already Added");
           }             
        },
     })
}

function remove_wishlist(id){
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/remove_wishlist',      
        type:'post',      
        data:{'id':id},      
        dataType:'json', 
        success:function(response){ 
           if(response.status == 1){
              $('.wishlist_count').html(response.count);
              toastr["success"]("Removed");
              window.location.reload();
           }else if(response.status==2){
              var dd = response.error ;
              for(var i=0; i<dd.length;i++){
                 toastr["error"](dd[i]);
              }
           }else if(response.status == 3){
              toastr["error"]("Couldn't insert right now");
           }else if(response.status == 4){
              toastr["success"]("Already Added");
           }             
        },
     })
}

function count_wishlist(id){
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/count_wishlist',      
        type:'post',      
        data:{'id':id},      
        dataType:'json', 
        success:function(response){ 
           if(response.status == 1){
              $('.wishlist_count').html(response.count);
           }          
        },
     })
}

function remove_cart(id){
  // e.preventDefault(); 
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/remove_cart',      
        type:'post',      
        data:{'id':id},      
        dataType:'json', 
        success:function(response){ 
           if(response.status == 1){
              $('.cart_count').html(response.count);
              $('#remone_cart'+id).remove();
              cart_item();
              toastr["success"]("cart Removed");
           }else if(response.status==2){
              var dd = response.error ;
              for(var i=0; i<dd.length;i++){
                 toastr["error"](dd[i]);
              }
           }else if(response.status == 3){
              toastr["error"]("Couldn't insert right now");
           }else if(response.status == 4){
              toastr["success"]("data Updated");
              // setTimeout( "redirect(siteUrl +'/view_product')",2000);  
           }             
        },
     })
}

function updatecart(obj){
  id = $(obj).attr('data-id');
  qty = $(obj).val();
  // console.log($(obj).attr('data-id'),$(obj).val());
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/updateCart',      
        type:'post',      
        data:{'id':id,'qty':qty},      
        dataType:'json', 
        success:function(response){ 
           if(response.status == 1){
              toastr["success"]("cart Updated");
               setTimeout( location.reload(),2000);        
           }else if(response.status==2){
              var dd = response.error ;
              for(var i=0; i<dd.length;i++){
                 toastr["error"](dd[i]);
              }
           }else if(response.status == 3){
              toastr["error"]("Couldn't update");
           }else if(response.status == 4){
              toastr["success"]("data Updated");
              // setTimeout( "redirect(siteUrl +'/view_product')",2000);  
           }             
        },
     })
}

function count_cart(id){
  // e.preventDefault(); 
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/count_cart',      
        type:'post',      
        // data:{'id':id},      
        dataType:'json', 
        success:function(response){ 
           if(response.status == 1){
              $('.cart_count').html(response.count);
           }            
        },
     })
}



function cart_item(id){
  // e.preventDefault(); 
     $.ajaxSetup({
                 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
             });
     $.ajax({    
        url:siteUrl +'/cart_item',      
        type:'post',      
        // data:{'id':id},      
        dataType:'json', 
        success:function(response){ 
         console.log(response.cart_item);
           if(response.status == 1){
              var html = '';
              var price = 0;
              $.each(response.cart_item, function(key,val) {
                 html += '<div class="cart-drawer-item d-flex position-relative"> <div class="position-relative"> <img loading="lazy" class="cart-drawer-item__img" src="'+val.attributes.image+'" alt=""> </div> <div class="cart-drawer-item__info flex-grow-1"> <h6 class="cart-drawer-item__title fw-normal">'+val.name+'</h6> <div class="d-flex align-items-center justify-content-between mt-1"> <span class="cart-drawer-item__price money price">&#8377;  '+val.price+' x '+val.quantity+'</span> </div> </div> <button class="btn-close-xs position-absolute top-0 end-0 js-cart-item-remove" onclick="remove_cart('+val.id+')" id="remone_cart'+val.id+'"></button> </div> <hr class="cart-drawer-divider">';
                  price+= val.price*val.quantity;
              });
              console.log(html);
              $('#add_cart_product').html(html);
              $('#total_cart_price').html(price);
           }            
        },
     })
}


$("#couponcheck").on("click",function(e){
 e.preventDefault(); 
 $.ajaxSetup({
       headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
   });
  $.ajax({ 
     type:"post",
     data:{code:$('#couponCode').val(),subTotal:$('#subTotal').val()},
     url:siteUrl + "/couponcheck",  
     success:function(res){
        if(res.status_code == 200){
           toastr.success(res.message);
           $("#discount").html(res.amount);
           new_total = $("#grand_total").html() - res.amount;
           $("#grand_total").html(new_total.toFixed(2));
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

function checkout(){
  if ($('#couponCode').val()) {
     window.location.href = siteUrl+'/checkout-page?coupon='+$('#couponCode').val();
  }else{
     window.location.href = siteUrl+'/checkout-page';
  }

}

$("#save_form").on("submit",function(e){
 e.preventDefault(); 
 $.ajaxSetup({
       headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
   });
  $.ajax({ 
     type:"post",
     url:siteUrl + "/save_contact",  
     data:new FormData(this),
     processData: false, 
       contentType: false, 
     success:function(res){
        if(res.status_code == 200){
           toastr.success(res.message);
         //   $("#save_form").trigger("reset");
         setTimeout(() => window.location.href = siteUrl + "/", 3000);
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

$("#newslatter").on("submit",function(e){
 e.preventDefault(); 
 $.ajaxSetup({
       headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
   });
  $.ajax({ 
     type:"post",
     url:siteUrl + "/save_newsletter",  
     data:new FormData(this),
     processData: false, 
       contentType: false, 
     success:function(res){
        if(res.status_code == 200){
           toastr.success(res.message);
           $("#newslatter").trigger("reset");
           $("#newsletterPopup").modal("hide");
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

// $("#payment").on("submit",function(e){
//   e.preventDefault(); 
//   $.ajaxSetup({
//         headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
//     });
//    $.ajax({ 
//       type:"post",
//       url:siteUrl + "/payment",  
//       data:new FormData(this),
//       processData: false, 
//         contentType: false, 
//       success:function(res){
//          if(res.status_code == 200){
//             toastr.success(res.message);
//             $("#newslatter").trigger("reset");
//          }else if(res.status_code == 301){
//             $.each(res.message,function(key , value){
//                toastr.warning(value);
//             });
//          }else if(res.status_code == 201){
//             toastr.warning(res.message);
//          }
//       },error:function(e){
//          console.log(e);       
//       }
//    });
// });

function validatecheck(){
  if ($('#name').val() =='' || $('#email').val() =='' || $('#country').val() =='' || $('#state').val() =='' || $('#city').val() =='' || $('#pincode').val() =='' || $('#address').val() =='') {
        toastr.warning('All Feilds Marked With * Are Required');
        $('#btn').attr('disabled',true);
  }else{
     $('#btn').attr('disabled',false);
  }
}

function fill_address(){
  if ($('#checkbox').val() ==1) {
        $('#country').val(country);
        $('#state').val(state);
        $('#city').val(city);
        $('#pincode').val(pincode);
        $('#address').html(address);
        $('#checkbox').val(2);
        validatecheck();
  }else{
     $('#country').val('');
        $('#state').val('');
        $('#city').val('');
        $('#pincode').val('');
        $('#address').html('');
        $('#checkbox').val(1);
  }
}

function getship(){
  var pincode = $('#pincode').val();
  var ship_html = $('#ship_html').html();
  var p_total = $('#p_total').html();
  if(pincode.length>5){
        $.ajaxSetup({
          headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
      });
     $.ajax({ 
        type:"post",
        data:{'pincode':pincode},
        url:siteUrl + "/get_ship",  
        success:function(res){
           if (res) {
              tot = (parseInt(p_total) - parseInt(ship_html)) + parseInt(res);
              $('#ship_val').val(res);
              $('#total_val').val(tot);
              $('#ship_html').html(res);
              console.log(res,ship_html,tot,p_total);
              $('#p_total').html(tot);
           }
           
        },error:function(e){
           console.log(e);       
        }
     });
  }
 
};

function order_cancel(id){
        $.ajaxSetup({
          headers: { 'X-CSRF-Token': $('meta[name=_token]').attr('content') }
      });
     $.ajax({ 
        type:"post",
        data:{'id':id},
        url:siteUrl + "/order_cancel",  
        success:function(res){
           if (res) {
              window.location.reload();
           }
           
        },error:function(e){
           console.log(e);       
        }
     });
 
};