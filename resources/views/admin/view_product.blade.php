

@extends('admin.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
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
        <li class="breadcrumb-item"><a href="#">View Product</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
              <h4 class="box-title">Product List</h4>
              <div class="box-controls pull-right">
				<div class="lookup lookup-circle lookup-right">
				  <input type="text" name="s">
				</div>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<div class="table-responsive">
				  <table class="table table-hover" id="cat_datatable">
                  <div class="row p-4">
                                                 <div class="form-group col-lg-3">
                                                    <label for="brand">Brand</label>
                                                    <select onchange="showDatatable()" id="brand"
                                                            
                                                            class="form-control" name="brand">
                                                        <option value="">Select option</option>
                                                        @if(!empty($brand))
                                                        @foreach($brand as $key=>$value)
                                                        <option value="{{$value->id}}"{{@$product->brand_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-3">
                                                    <label for="cat">Category</label>
                                                    <select id="cat"
                                                            
                                                            class="form-control" name="cat" onchange="sub_cats();showDatatable()">
                                                        <option value="">Select option</option>
                                                        @if(!empty($cat))
                                                        @foreach($cat as $key=>$value)
                                                        <option value="{{$value->id}}" {{@$product->cat_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="sub_cat">Sub-Category</label>
                                                    <select onchange="showDatatable()" id="sub_cat"
                                                            
                                                            class="form-control" name="sub_cat">
                                                        <option value="">Select option</option>
                                                        @if(!empty($sub_cat))
                                                        @foreach($sub_cat as $key=>$value)
                                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-3">
                                                    <label for="rac">Rac</label>
                                                    <select onchange="showDatatable()" id="rac"
                                                            
                                                            class="form-control" name="rac">
                                                        <option value="">Select option</option>
                                                        @if(!empty($cat))
                                                        @foreach($cat as $key=>$value)
                                                        <option value="{{$value->id}}" {{@$product->cat_id == $value->id?'selected':''}}>{{$value->commision}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>


                                             </div>
					<thead>
                    <tr class="userDatatable-header">
                        <th>#</th>

                        <th >Name</th>
                        <th >Image</th>
                        <th >Info</th>
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
    <!-- /.content -->
  </div>

@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('admin_assets/custom_js/product.js')}}"></script>

@endsection