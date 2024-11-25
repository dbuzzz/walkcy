@extends('admin.layout')
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
                                                aria-current="page">Order-detail</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Order-detail</h1>
                                </div>
                               {{--  <a href="#"
                                   class="btn btn-success ml-3">Add Product</a> --}}
                            </div>
                        </div>

                    <div class="card card-form">
                        <div class="row no-gutters">
                            
                            <div class="col-lg-12 card-form__body">

                                <div class="table-responsive border-bottom"
                                     data-toggle="lists"
                                     data-lists-values='["js-lists-values-employee-name"]'>

                                    <table class="table mb-0 thead-border-top-0">
                                        <thead>
                                            <tr>

                                                <th>Info</th>

                                                <th>address</th>
                                                <th>Location</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="list">

                                            <tr>

                                                <td>

                                                   Order-id:-<span class="badge badge-success" style="cursor:pointer;">{{@$order->id}}</span>
                                                   <br>name:-<strong>{{@$order->name}}</strong><br>E-mail:-<strong>{{@$order->email}}</strong><br>Phone:-<strong>{{@$order->phone}}</strong>

                                                </td>
                                                <td><small class="text-muted">{{@$order->address}}</small></td>

                                                <td>
                                                    Country:-<strong>{{@$order->country}}</strong><br>State:-<strong>{{@$order->state}}</strong><br>City:-<strong>{{@$order->city}}</strong><br>Pincode:-<strong>{{@$order->pincode}}</strong>
                                                </td>
                                                
                                                
                                            </tr>
                                           

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card card-form">
                        <div class="row no-gutters">
                            
                            <div class="col-lg-12 card-form__body">

                                <div class="table-responsive border-bottom"
                                     data-toggle="lists"
                                     data-lists-values='["js-lists-values-employee-name"]'>

                                    <table class="table mb-0 thead-border-top-0">
                                        <thead>
                                            <tr>

                                                <th>Info</th>
                                                <th>Quanity</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="list">
                                            @foreach($order_details as $key=>$value)

                                            <tr>

                                                <td>

                                                   Order-id:-<span class="badge badge-success" style="cursor:pointer;">{{@$order->id}}</span>
                                                   <br>Vendor name:-<strong>{{@$value->username}}</strong><br>Product name:-<strong>{{@$value->name}}</strong><br>Variant:-<strong>{{@$value->variation}}</strong>

                                                </td>
                                                <td><small class="text-muted">{{@$value->quantity}}</small></td>

                                                <td>
                                                    Price:-<strong>{{@$value->price}}</strong><br>Discount:-<strong>{{@$value->coupon_discount}}</strong><br>Shipping:-<strong>{{@$value->shipping}}</strong><br>Tax:-<strong>{{@$value->tax}}</strong>
                                                </td>

                                                <td>
                                                    <label for="role">Status</label>
                                                <select onchange="order_status({{@$value->id}})" id="order_status"
                                                       
                                                        class="form-control" name="role">
                                                    <option value="">Select option</option>
                                                    <option value="1" {{@$value->order_status == 1?'selected':''}}>Pending</option>
                                                    <option value="2" {{@$value->order_status == 2?'selected':''}}>Shipped</option>
                                                    <option value="3" {{@$value->order_status == 3?'selected':''}}>Delivered</option>
                                                    
                                                </select>
                                                </td>
                                                
                                                
                                            </tr>
                                            @endforeach
                                           

                                        </tbody>
                                    </table>
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
<script src="{{url('admin_assets/custom_js/order.js')}}"></script>

@endsection