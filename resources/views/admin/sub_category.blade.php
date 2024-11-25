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
        Sub-Category
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Sub-Category</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="row">
    <div class="col-4">
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
                                        <form id="subcategory_form">
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sub-Category Name</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="subcategory" 
                                                       id="subcategory" 
                                                       placeholder="Enter Sub-Category ..">
                                            </div>

                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select id="category"
                                                        
                                                        class="form-control" name="category">
                                                    <option value="">Select option</option>
                                                    @if(!empty($category))
                                                    @foreach($category as $key=>$value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image</label>
                                                <span style="color:red">1080 x 1080 px</span>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image"
                                                       id="file" 
                                                       accept=".jpg,.png,.jpeg">
                                            </div>
                                            <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image">
                                           
                                            <button type="submit"
                                                    class="btn btn-primary col-md-12" id="submit">Submit</button>
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
    
    <div class="col-8">
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
                                                        <!--<th>ID</th>-->
                                                        <th >Sub-Category</th>
                                                        <th >Category</th>
                                                        <th >Image</th>
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
<script src="{{url('admin_assets/custom_js/sub_category.js')}}"></script>

@endsection