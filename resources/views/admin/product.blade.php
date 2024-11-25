@extends('admin.layout')
@section('extern-css')

@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Add Product</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div id="gallery">
		  
		  <!-- Default box -->
		  <div class="box">
			<div class="box-body">
            <form id="save_forms">
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

                                                 <div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Variant</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="variant[]" 
                                                           id="variant" 
                                                           placeholder="Enter variant .."
                                                           value="{{@$value->variant}}">
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Quantity</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="qty[]" 
                                                           id="qty" 
                                                           placeholder="Enter qty .."
                                                           value="{{@$value->qty}}">
                                                </div>


                                                <div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Mrp</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="mrp[]" 
                                                           id="mrp" 
                                                           placeholder="Enter mrp .."
                                                           value="{{@$value->mrp}}">
                                                </div>


                                                <div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Price</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="price[]" 
                                                           id="price" 
                                                           placeholder="Enter price .."
                                                           value="{{@$value->price}}">
                                                </div><div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Color</label>
                                                    <input type="color"
                                                           class="form-control"
                                                           name="color[]" 
                                                           id="color" 
                                                           placeholder="Enter color .."
                                                           value="{{@$value->color}}">
                                                </div>

                                                

                                                


                                              


                                               
                                                @if(!empty($key))
                                                <div class="col-md-4 mt-4">
                                                <a href="javascript:void(0)"class="remove_field btn btn-danger btn-xs">-</a>
                                                </div>
                                                @else
                                                <div class="col-md-4 mt-4">
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


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Mrp</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="mrp[]" 
                                                           id="mrp" 
                                                           placeholder="Enter mrp .."
                                                           value="{{@$product->mrp}}">
                                                </div>


                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Price</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="price[]" 
                                                           id="price" 
                                                           placeholder="Enter price .."
                                                           value="{{@$product->price}}">
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Color</label>
                                                    <input type="color"
                                                           class="form-control"
                                                           name="color[]" 
                                                           id="color" 
                                                           placeholder="Enter color .."
                                                           value="{{@$product->price}}">
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="exampleInputEmail1">Image</label>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="variantImage[]" 
                                                           id="variantImage" 
                                                           placeholder="Enter variantImage .."
                                                           value="{{@$product->price}}">
                                                </div>



                                                <div class="col-md-4 mt-4">
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
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

@endsection
@section('extern-js')
<script src="{{url('admin_assets/custom_js/product.js')}}"></script>

@endsection