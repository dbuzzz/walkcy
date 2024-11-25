$("#admin_login").on("submit",function(e){
	// alert(1);
	e.preventDefault();
	$.ajax({
		type:"post",
		url:siteUrl + "/admin_login",
		data:new FormData(this),
		processData: false,
    	contentType: false,
		success:function(res){
			if(res.status_code == 200){
				window.location.href = siteUrl+"/product-management";
				console.log('logib');			
			}else if(res.status_code == 202){
				$.each(res.error,function(key , value){
					toastr.warning(value);
				});
			}else if(res.status_code == 201){
				toastr.warning(res.message);
			}
		},error:function(e){
			console.log(e);		
		}
	});
})


$("#signup_form").on("submit",function(e){
	e.preventDefault();
	$.ajax({
		type:"post",
		url:siteUrl + "/saveSignUp",
		data:new FormData(this),
		processData: false,
    	contentType: false,
		success:function(res){
			if(res.status_code == 200){
				toastr.success('A mail is send to the given Maing Address');
				// $('#link').html('<a href="'+res.token+'" target="_blank">Verify</a>');
				// window.location.href = siteUrl+"/admin";
			}else if(res.status_code == 202){
				$.each(res.error,function(key , value){
					console.log(value);
					toastr.warning(value);
				});
			}else if(res.status_code == 201){
				toastr.warning(res.message);
			}
		},error:function(e){
			console.log(e);		
		}
	});
})

$("#verification_form").on("submit",function(e){
	e.preventDefault();
	$.ajax({
		type:"post",
		url:siteUrl + "/verify",
		data:new FormData(this),
		processData: false,
    	contentType: false,
		success:function(res){
			if(res.status_code == 200){
				window.location.href = siteUrl+"/admin";
			}else if(res.status_code == 202){
				$.each(res.error,function(key , value){
					console.log(value);
					toastr.warning(value);
				});
			}else if(res.status_code == 201){
				toastr.warning(res.message);
			}
		},error:function(e){
			console.log(e);		
		}
	});
})