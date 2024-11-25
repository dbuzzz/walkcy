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
        Orders
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Orders</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="col-12">
          <div class="box box-solid bg-gray">
            <div class="box-header with-border">
              <h4 class="box-title">Order List</h4>
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
				      <div class="row p-4 m-4">
				          <div class="form-group col-lg-4">
                            <label for="exampleInputEmail1">Start Date</label>
                            <input type="date"
                                   class="form-control"
                                   name="startDate" 
                                   id="startDate" 
                                   placeholder=""
                                   value=""
                                   onchange="$('#endDate').attr('disabled',false)">
                          </div>
                          
                          <div class="form-group col-lg-4">
                            <label for="exampleInputEmail1">End Date</label>
                            <input type="date"
                                   class="form-control"
                                   name="endDate" 
                                   id="endDate" 
                                   placeholder=""
                                   value=""
                                   disabled
                                   onchange="showDatatable()">
                          </div>
                          
                          
				          <div class="form-group col-lg-4">
                            <label for="paymentMethod">Payment Method</label>
                            <select id="paymentMethod"
                                    
                                    class="form-control" onchange="showDatatable()">
                                <option value="">Select option</option>
                                <option value="Cash">Cash</option>
                                <option value="Card">Card</option>
                                <option value="UPI">UPI</option>
                               
                            </select>
                        </div>
				      </div>
					<thead>
                    <tr class="userDatatable-header">
                        <th>#</th>
                        <th >Info</th>
                        <!--<th >Address</th>-->
                        <!--<th >location</th>-->
                        <th >Order</th>
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
<script src="{{url('admin_assets/custom_js/order.js')}}"></script>

@endsection