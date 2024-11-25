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
                                                aria-current="page">Coupon-Management</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Coupon-Management</h1>
                                </div>
                               {{--  <a href="#"
                                   class="btn btn-success ml-3">Add Product</a> --}}
                            </div>
                        </div>

                        <div class="container-fluid page__container">
                        <div class="row">
                            @if(Auth::user()->user_type == 1)
                            <div class="card card-form col-lg-12">
                                <div class="row no-gutters">
                                   -
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="save_form">
                                            <input type="hidden" name="id" id="id">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="name" 
                                                           id="name" 
                                                           placeholder="Enter Coupon Name ..">
                                                </div>

                                                
                                                <div class="form-group col-lg-6">
                                                    <label for="type">Type</label>
                                                    <select id="type"
                                                            
                                                            class="form-control" name="type">
                                                        <option value="">Select option</option>
                                                        <option value="1">Discount By Percentage</option>
                                                        <option value="2">Discount By Amount</option>
                                                        
                                                    </select>
                                                </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Discount Value</label>
                                                <input type="number"
                                                       class="form-control"
                                                       name="value" 
                                                       id="value" 
                                                       placeholder="Enter Value ..">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="flatpickrSample02">Validity</label>
                                                <input id="validity"
                                                       type="text"
                                                       class="form-control"
                                                       placeholder="Coupon Validity"
                                                       data-toggle="flatpickr"
                                                       data-flatpickr-mode="range"
                                                       name="validity" 
                                                       >
                                            </div>


                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Minimum Order Amount</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="order_amount" 
                                                       id="order_amount" 
                                                       placeholder="Enter order_amount ..">
                                            </div>


                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Max Discount</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="max_discount" 
                                                       id="max_discount" 
                                                       placeholder="Enter Max Discount ..">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                    <label for="usage">Per User Usage</label>
                                                    <select onchange="shows()" id="usage"
                                                            
                                                            class="form-control" name="usage">
                                                        <option value="">Unlimited</option>
                                                        <option value="1">Limited</option>
                                                        
                                                    </select>
                                                </div>

                                            <div style="display: none;" id="show" class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Usage Limit</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="limit" 
                                                       id="limit" 
                                                       placeholder="Enter limit ..">
                                            </div>

                                            </div>
                                           
                                            <button type="submit"
                                                    class="btn btn-primary" id="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif

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
                                                        <th>ID</th>
                                                        <th >Name</th>
                                                        <th >Code</th>
                                                        <th >Info</th>
                                                        <th >Value</th>
                                                        <th >Validity</th>
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
<script src="{{url('admin_assets/custom_js/coupon.js')}}"></script>

@endsection