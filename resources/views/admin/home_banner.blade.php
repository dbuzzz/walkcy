{{-- @extends('admin.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')
<div class="mdk-drawer-layout__content page">
                        <div class="container-fluid page__container">
                            <div class="page__heading d-flex align-items-center">
                                <div class="flex">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                            <li class="breadcrumb-item active"
                                                aria-current="page">HomePage-Banner</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">HomePage-Banner</h1>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid page__container">
                        <div class="row">
                            <div class="card card-form col-lg-12">
                                <div class="row no-gutters">
                                   
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="category_form">
                                        <div class="row">
                                            <input type="hidden" name="id" id="id">

                                            <div class="form-group col-lg-4">
                                                <label for="cat1">Category</label>
                                                <select id="cat1"
                                                        
                                                        class="form-control" name="cat1">
                                                    <option value="">Select option</option>
                                                    @if(!empty($category))
                                                    @foreach($category as $key=>$value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Banner</label><span style="color:red">565 x 550 px</span>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image"
                                                       id="file" 
                                                       placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="col-lg-4">
                                                <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image">
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="cat2">Category</label>
                                                <select id="cat2"
                                                        
                                                        class="form-control" name="cat2">
                                                    <option value="">Select option</option>
                                                    @if(!empty($category))
                                                    @foreach($category as $key=>$value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Banner2</label><span style="color:red">650 x 295 px</span>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image1"
                                                       id="file1" 
                                                       placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="col-lg-4">
                                                <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image1">
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="cat3">Category</label>
                                                <select id="cat3"
                                                        
                                                        class="form-control" name="cat3">
                                                    <option value="">Select option</option>
                                                    @if(!empty($category))
                                                    @foreach($category as $key=>$value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Banner3</label><span style="color:red">650 x 295 px</span>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image2"
                                                       id="file2" 
                                                       placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="col-lg-4">
                                                <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image2">
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="cat4">Category</label>
                                                <select id="cat4"
                                                        
                                                        class="form-control" name="cat4">
                                                    <option value="">Select option</option>
                                                    @if(!empty($category))
                                                    @foreach($category as $key=>$value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="exampleInputEmail1">Coupon Banner</label><span style="color:red">300 x 500 px</span>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image3"
                                                       id="file3" 
                                                       placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="col-lg-4">
                                                <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image3">
                                            </div>
                                            
                                           
                                            <button type="submit"
                                                    class="btn btn-primary" id="submit">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-form col-lg-12">
                                <div class="row no-gutters">
                                    
                                    <div class="col-lg-12 card-form__body">

                                        <div class="table-responsive border-bottom"
                                             data-toggle="lists"
                                             data-lists-values='["js-lists-values-employee-name"]'>

                                            <table class="table mb-0 thead-border-top-0" id="cat_datatable">
                                                <thead>
                                                    <tr class="userDatatable-header">
                                                        <th>#</th>
                                                        <th >Banner1</th>
                                                        <th >Banner2</th>
                                                        <th >Banner3</th>
                                                        <th >Coupon Banner</th>
                                                        <th >Status</th>
                                                        <th >Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list"
                                                       id="staff">

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>

                    </div>

@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('admin_assets/custom_js/home_banner.js')}}"></script>

@endsection --}}

@extends('admin.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

                    
<div class="content-wrapper px-4">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        HomePage
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">HomePage</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="row">
    <div class="col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
              <h4 class="box-title">Add</h4>
              <div class="box-controls pull-right">
				<div class="lookup lookup-circle lookup-right">
				  <input type="text" name="s">
				</div>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body px-4">
				<div class="row">
				     @if(Auth::user()->user_type == 1)
                            <div class="card card-form col-lg-12">
                                <div class="row no-gutters">
                                   
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="category_form">
                                            <div class="row">
                                                <input type="hidden" name="id" id="id">
    
                                                <div class="form-group col-lg-4">
                                                    <label for="cat1">Category</label>
                                                    <select id="cat1"
                                                            
                                                            class="form-control" name="cat1">
                                                        <option value="">Select option</option>
                                                        @if(!empty($category))
                                                        @foreach($category as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
    
                                                <div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Banner</label><span style="color:red">565 x 550 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image"
                                                           id="file" 
                                                           placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                                </div>
                                                <div class="col-lg-4">
                                                    <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image">
                                                </div>
    
                                                <div class="form-group col-lg-4">
                                                    <label for="cat2">Category</label>
                                                    <select id="cat2"
                                                            
                                                            class="form-control" name="cat2">
                                                        <option value="">Select option</option>
                                                        @if(!empty($category))
                                                        @foreach($category as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
    
                                                <div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Banner2</label><span style="color:red">650 x 295 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image1"
                                                           id="file1" 
                                                           placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                                </div>
                                                <div class="col-lg-4">
                                                    <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image1">
                                                </div>
    
                                                <div class="form-group col-lg-4">
                                                    <label for="cat3">Category</label>
                                                    <select id="cat3"
                                                            
                                                            class="form-control" name="cat3">
                                                        <option value="">Select option</option>
                                                        @if(!empty($category))
                                                        @foreach($category as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
    
                                                <div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Banner3</label><span style="color:red">650 x 295 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image2"
                                                           id="file2" 
                                                           placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                                </div>
                                                <div class="col-lg-4">
                                                    <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image2">
                                                </div>
    
                                                <div class="form-group col-lg-4">
                                                    <label for="cat4">Category</label>
                                                    <select id="cat4"
                                                            
                                                            class="form-control" name="cat4">
                                                        <option value="">Select option</option>
                                                        @if(!empty($category))
                                                        @foreach($category as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
    
                                                <div class="form-group col-lg-4">
                                                    <label for="exampleInputEmail1">Coupon Banner</label><span style="color:red">300 x 500 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image3"
                                                           id="file3" 
                                                           placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                                </div>
                                                <div class="col-lg-4">
                                                    <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image3">
                                                </div>
                                                
                                               
                                                <button type="submit"
                                                        class="btn btn-primary" id="submit">Submit</button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            @endif
				</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    
    <div class="col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
              <h4 class="box-title">List</h4>
              <div class="box-controls pull-right">
				<div class="lookup lookup-circle lookup-right">
				  <input type="text" name="s">
				</div>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<div class="table-responsive">
				  <table class="table mb-0 thead-border-top-0" id="cat_datatable">
                                                <thead>
                                                    <tr class="userDatatable-header">
                                                        <th>#</th>
                                                        <th >Banner1</th>
                                                        <th >Banner2</th>
                                                        <th >Banner3</th>
                                                        <th >Coupon Banner</th>
                                                        <th >Status</th>
                                                        <th >Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list"
                                                       id="staff">

                                                </tbody>
                                            </table>
				</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        </div>
    <!-- /.content -->
  </div>

@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('admin_assets/custom_js/home_banner.js')}}"></script>

@endsection