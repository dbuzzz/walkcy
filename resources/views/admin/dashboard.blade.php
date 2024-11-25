@extends('admin.layout')
@section('extern-css')
 <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        /* *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        } */

    /* body{
    background: #f4f5;
    padding: 0 20px;
    } */

    ::selection{
    color: #fff;
    background: #664AFF;
    }

    .container{
    max-width: 450px;
    margin: 150px auto;
    }

    .container .searchInput{
    background: #fff;
    width: 100%;
    border-radius: 5px;
    position: relative;
    box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
    }

    .searchInput input{
    height: 55px;
    width: 100%;
    outline: none;
    border: none;
    border-radius: 5px;
    padding: 0 60px 0 20px;
    font-size: 18px;
    box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
    }

    .searchInput.active input{
    border-radius: 5px 5px 0 0;
    }

    .searchInput .resultBox{
    padding: 0;
    opacity: 0;
    pointer-events: none;
    max-height: 280px;
    overflow-y: auto;
    }

    .searchInput.active .resultBox{
    padding: 10px 8px;
    opacity: 1;
    pointer-events: auto;
    }

    .resultBox li{
    list-style: none;
    padding: 8px 12px;
    display: none;
    width: 100%;
    cursor: default;
    border-radius: 3px;
    }

    .searchInput.active .resultBox li{
    display: block;
    }
    .resultBox li:hover{
    background: #efefef;
    }

    .searchInput .icon {
    position: absolute;
    right: 0px;
    top: 0px;
    height: 69px;
    width: 87px;
    text-align: center;
    line-height: 90px;
    font-size: 20px;
    color: #644bff;
    cursor: pointer;
}

.avatar[class*='status-']::after {
    content: '';
    position: absolute;
    right: 0px;
    bottom: 0;
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 100%;
    border: 2px solid #ffffff00;
    background-color: #04a9f500;
}
 </style>
@endsection
@section('content')

<div class="modal fade bs-example-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <div class="row">
                            <div class="card card-form col-lg-12">
                                <div class="row no-gutters">
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="save_form">
                                            <input type="hidden" name="id" id="id" value="{{@$product->id}}">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputEmail1">Product-Name</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="name" 
                                                           id="name" 
                                                           placeholder="Enter Name .."
                                                           value="{{@$product->name}}">
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="brand">Brand</label>
                                                    <select id="brand"
                                                            
                                                            class="form-control" name="brand">
                                                        <option value="">Select option</option>
                                                        @if(!empty($brand))
                                                        @foreach($brand as $key=>$value)
                                                        <option value="{{$value->id}}"{{@$product->brand_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <label for="tax">Tax</label>
                                                    <select id="tax"
                                                            
                                                            class="form-control" name="tax">
                                                        <option value="">Select option</option>
                                                        @if(!empty($tax))
                                                        @foreach($tax as $key=>$value)
                                                        <option value="{{$value->id}}" {{@$product->tax_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <label for="cat">Category</label>
                                                    <select id="cat"
                                                            
                                                            class="form-control" name="cat" onchange="sub_cats()">
                                                        <option value="">Select option</option>
                                                        @if(!empty($cat))
                                                        @foreach($cat as $key=>$value)
                                                        <option value="{{$value->id}}" {{@$product->cat_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <label for="sub_cat">Sub-Category</label>
                                                    <select id="sub_cat"
                                                            
                                                            class="form-control" name="sub_cat">
                                                        <option value="">Select option</option>
                                                        @if(!empty($sub_cat))
                                                        @foreach($sub_cat as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                @if(!empty($variant))
                                                @php
                                                $i = 1;
                                                @endphp
                                                @foreach($variant as $key=>$value)

                                                <div class="col-lg-12">
                                                    <h3>Variant {{$i}}</h3>
                                                </div>

                                                 <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Variant</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="variant[]" 
                                                           id="variant" 
                                                           placeholder="Enter variant .."
                                                           value="{{@$value->variant}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Quantity</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="qty[]" 
                                                           id="qty" 
                                                           placeholder="Enter qty .."
                                                           value="{{@$value->qty}}">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Mrp</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="mrp[]" 
                                                           id="mrp" 
                                                           placeholder="Enter mrp .."
                                                           value="{{@$value->mrp}}">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Price</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="price[]" 
                                                           id="price" 
                                                           placeholder="Enter price .."
                                                           value="{{@$value->price}}">
                                                </div><div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Color</label>
                                                    <input type="color"
                                                           class="form-control"
                                                           name="color[]" 
                                                           id="color" 
                                                           placeholder="Enter color .."
                                                           value="{{@$value->color}}">
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Length (cm)</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="length[]" 
                                                           id="length" 
                                                           placeholder="Enter length .."
                                                           value="{{@$value->length}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Breath (cm)</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="breath[]" 
                                                           id="breath" 
                                                           placeholder="Enter breath .."
                                                           value="{{@$value->breath}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Height (cm)</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="height[]" 
                                                           id="height" 
                                                           placeholder="Enter height .."
                                                           value="{{@$value->height}}">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Weight(KG)</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="weight[]" 
                                                           id="weight" 
                                                           placeholder="Enter weight .."
                                                           value="{{@$value->weight}}">
                                                </div>
                                                @if(!empty($key))
                                                <div class="col-md-2 mt-4">
                                                <a href="javascript:void(0)"class="remove_field btn btn-danger btn-xs">-</a>
                                                </div>
                                                @else
                                                <div class="col-md-2 mt-4">
                                                <a href="javascript:void(0)"class="add_field_button btn btn-success btn-xs">+</a>
                                                </div>
                                                @endif
                                                @php
                                                $i++;
                                                @endphp
                                            
                                            @endforeach
                                            @else

                                             <div class="col-lg-12">
                                                    <h3>Variant 1</h3>
                                                </div>

                                                 <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Variant</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="variant[]" 
                                                           id="variant" 
                                                           placeholder="Enter variant .."
                                                           value="{{@$product->variant}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Quantity</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="qty[]" 
                                                           id="qty" 
                                                           placeholder="Enter qty .."
                                                           value="{{@$product->qty}}">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Mrp</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="mrp[]" 
                                                           id="mrp" 
                                                           placeholder="Enter mrp .."
                                                           value="{{@$product->mrp}}">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Price</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="price[]" 
                                                           id="price" 
                                                           placeholder="Enter price .."
                                                           value="{{@$product->price}}">
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Color</label>
                                                    <input type="color"
                                                           class="form-control"
                                                           name="color[]" 
                                                           id="color" 
                                                           placeholder="Enter color .."
                                                           value="{{@$product->price}}">
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Length</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="length[]" 
                                                           id="length" 
                                                           placeholder="Enter length .."
                                                           value="{{@$product->length}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Breath</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="breath[]" 
                                                           id="breath" 
                                                           placeholder="Enter breath .."
                                                           value="{{@$product->breath}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Height</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="height[]" 
                                                           id="height" 
                                                           placeholder="Enter height .."
                                                           value="{{@$product->height}}">
                                                </div>


                                                <div class="form-group col-lg-2">
                                                    <label for="exampleInputEmail1">Weight(KG)</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="weight[]" 
                                                           id="weight" 
                                                           placeholder="Enter weight .."
                                                           value="{{@$product->weight}}">
                                                </div>

                                                <div class="col-md-2 mt-4">
                                                <a href="javascript:void(0)"class="add_field_button btn btn-success btn-xs">+</a>
                                            </div>
                                            @endif
                                            <div id="appendData"></div>
                                                <!-- <div class="form-group col-lg-12 pb-4">
                                                    <label for="exampleInputEmail1">Product Description</label>
                                                        <div id="editor">
                                                        {!!@$product->description!!}
                                                
                                                        </div>
                                                    
                                                </div>

                                                <div class="form-group col-lg-12 pb-4 pt-4">
                                                    <label for="exampleInputEmail1">Product Description</label>
                                                        <div id="editor2">
                                                        {!!@$product->description2!!}
                                                
                                                        </div>
                                                    
                                                </div> -->
                                               
                                                <div class="form-group col-lg-6 pt-4 mt-4">
                                                    <label for="exampleInputEmail1">Featured Image</label><span style="color:red">1080 x 1080 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image"
                                                           id="file" 
                                                           accept=".jpg,.png,.jpeg">
                                                </div>

                                                <div class="form-group col-lg-6 pt-4 mt-4">
                                                    <img style=" padding: 11px; width: 265px; height: 185px; " src="{{!empty($product)?$product->image:asset('uploads/default/default-image.jpg')}}" id="image">
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputEmail1">Other Image</label>
                                                    <span style="color:red">1080 x 1080 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="o_image[]"
                                                           id="o_file" 
                                                           accept=".jpg,.png,.jpeg" multiple>
                                                </div>

                                                <div class="form-group col-lg-6" >
                                                    <div class="row" id="addImages">
                                                        <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <button type="submit"
                                                    class="btn btn-primary" id="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Billing
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Billing</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div id="gallery">
		  <div class="box">
			<div class="box-header">
					<h2 class="box-title">Billing</h2>
				    <div class="pull-right btn-group float-right">
                        <a href="void:[0]" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-success ml-3">Add Product</a>
					</div>
			</div>
		  </div>
		  <!-- Default box -->
		  <div class="box">
			<div class="box-body">
				<div id="gallery-content">
                    <div class=>
                        <div class="searchInput">
                            <input type="text" id="Input" placeholder="Search..">
                            <div class="resultBox" style=" max-height: 165px; background: #e3e3e3; border-radius: 10px; box-shadow: grey 6px 5px 20px; margin-bottom: 33px; "></div>
                            <div class="icon"><i class="fas fa-search"></i></div>
                        </div>
                    </div>

                    <div class="row" id="appendDatas">

                                    @php 
                            $cart = \Cart::getcontent();
                            $price = 0;
                            $subtotal = 0;
                            $tax = 0;
                        @endphp
                        @if(count($cart) !=0)
                        @foreach($cart as $key=>$value)

                        

                        <div class="col-xl-4 col-md-6 col-12"> <div class="media bg-white mb-30 pull-up"> <span class="avatar status-success"> <img class="avatar" src="{{$value->attributes['image']}}" alt="..."> </span> <div class="media-body"> <p><strong>{{$value->name}}({{$value->attributes['variant']}})</strong> <time class="float-right text-success text-bold">{{$value->quantity}}  X &#8377; {{$value->price}}</time></p> <p><input style="width:30px; height:30px" disabled type="color" value="{{$value->attributes['color']}}"></p> <ul class="list-inline mt-10"> <li><a href="#" class="link-black text-lg text-dark text-bold">{{$value->attributes['cat']}} </a></li> <li><a href="#" class="link-black text-lg text-dark text-bold">{{$value->attributes['sub_cat']}}</a></li> <li class="pull-right media-hover-show"> <button type="button" onclick="remove_cart({{$value->id}})" class="btn btn-box-tool btn-xs" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash"></i></button> </li> </ul> </div> </div> </div>
                        
                           
                           
                            
                        @php 
                            $subtotal +=(int)$value->price*(int)$value->quantity;
                        @endphp
                        @endforeach
                        @endif
                     
                    </div>
                    <div class="pull-right btn-group float-left" id="proceedChecoutButton" style="display:{{(count($cart) !=0)?'':'none'}}">
                        <a href="{{url('/cart-page')}}" class="btn btn-warning ml-3">Proceed..</a>
					</div>
				</div>
				</div>
			</div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection
@section('extern-js')
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
<script src="{{url('admin_assets/custom_js/product.js')}}"></script>
<script type="text/javascript">
    @if(!empty($product))
    sub_cats({{$product->cat_id}});
    @endif

    let suggestions = [
    "Channel",
    "CodingLab",
    "CodingNepal",
    "YouTube",
    "YouTuber",
    "YouTube Channel",
    "Blogger",
    "Bollywood",
    "Vlogger",
    "Vechiles",
    "Facebook",
    "Freelancer",
    "Facebook Page",
    "Designer",
    "Developer",
    "Web Designer",
    "Web Developer",
    "Login Form in HTML & CSS",
    "How to learn HTML & CSS",
    "How to learn JavaScript",
    "How to became Freelancer",
    "How to became Web Designer",
    "How to start Gaming Channel",
    "How to start YouTube Channel",
    "What does HTML stands for?",
    "What does CSS stands for?",
];

    // getting all required elements
    const searchInput = document.querySelector(".searchInput");
    const input = searchInput.querySelector("input");
    const resultBox = searchInput.querySelector(".resultBox");
    const icon = searchInput.querySelector(".icon");
    let linkTag = searchInput.querySelector("a");
    let webLink;

    // if user press any key and release
    input.onkeyup = (e)=>{
        let userData = e.target.value; //user enetered data
        let emptyArray = [];

        $.ajax({    
            url:siteUrl +'/product-management/getSearch',      
            type:'get',      
            data:{'search':$('#Input').val()},      
            success:function(response){ 
                console.log(response);
                // var html = '<option value="">Select State</option>';
                var html = '';
                $.each(response, function(key,val) {
                    html += '<li onclick="select(this)"><input type="hidden" class="inputClass" value = "'+val.name+'" color = "'+val.color+'" price = "'+val.price+'" varientid = "'+val.varientID+'" productid = "'+val.id+'" product="'+val.name+'('+val.variant+') ('+val.brand+') ('+val.cat+') ('+val.sub_cat+')" image = "'+val.image+'" cat = "'+val.cat+'" sub_cat = "'+val.sub_cat+'">'+val.name+'('+val.variant+') ('+val.brand+') ('+val.cat+') ('+val.sub_cat+')</li>';
                });
                $(".resultBox").html(html);
                searchInput.classList.add("active");
            
            },
        })
        // if(userData){
        //     emptyArray = suggestions.filter((data)=>{
        //         //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
        //         return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase()); 
        //     });
        //     emptyArray = emptyArray.map((data)=>{
        //         // passing return data inside li tag
        //         return data = '<li>'+ data +'</li>';
        //     });
        //     searchInput.classList.add("active"); //show autocomplete box
        //     showSuggestions(emptyArray);
        //     let allList = resultBox.querySelectorAll("li");
        //     for (let i = 0; i < allList.length; i++) {
        //         //adding onclick attribute in all li tag
        //         allList[i].setAttribute("onclick", "select(this)");
        //     }
        // }else{
        //     searchInput.classList.remove("active"); //hide autocomplete box
        // }
    }


    function select(obj){
            add_cart($(obj).children().attr('varientid'),$(obj).children().attr('productid'));
            $('.searchInput').removeClass('active');
            
    }
    function showSuggestions(list){
        let listData;
        if(!list.length){
            userValue = inputBox.value;
            listData = '<li>'+ userValue +'</li>';
        }else{
            listData = list.join('');
        }
        resultBox.innerHTML = listData;
    }
</script>
@endsection