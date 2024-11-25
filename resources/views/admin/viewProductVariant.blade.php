


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
        <li class="breadcrumb-item"><a href="#">Variants</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
              <h4 class="box-title">Variant List</h4>
              <div class="box-controls pull-right">
				<div class="lookup lookup-circle lookup-right">
				  <input type="text" name="s">
				</div>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
				<div class="table-responsive">
				  <table class="table table-hover" id="cat_datatables">
				      
                  <thead>
                                                    <tr class="userDatatable-header">
                                                        <th>#</th>

                                                        <th >Name</th>
                                                        <th >MRP</th>
                                                        <th >Price</th>
                                                        <th >Color</th>
                                                        <th >Quantity</th>
                                                        <!-- <th >Add</th> -->
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @php
                                                    $i=1;
                                                    @endphp
                                                    @if($variant)
                                                    @foreach($variant as $key=>$value)
                                                    <tr>
                                                        <input type="hidden" value="{{$value->prod_id}}" class="productID">
                                                    <th>{{$i}}</th>

                                                    <th >{{$value->variant}}</th>
                                                    <th >{{$value->mrp}}</th>
                                                    <th >{{$value->price}}</th>
                                                    <th ><div style="background:{{$value->color}}; width: 50px;height: 50px;"></div></th>
                                                    <th >{{$value->qty}}</th>
                                                    <!-- <th ><a  href="javascript:void(0)" onclick="add_cart({{$value->id}})">Add</a><br><a target="_blank" href="{{url('cart-page')}}">View</a></th> -->
                                                    </tr>
                                                    @php
                                                    $i++;
                                                    @endphp
                                                    @endforeach
                                                    @endif

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