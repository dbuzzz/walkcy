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
                                                aria-current="page">Blog-Category</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Blog-Category</h1>
                                </div>
                               {{--  <a href="#"
                                   class="btn btn-success ml-3">Add Product</a> --}}
                            </div>
                        </div>

                        <div class="container-fluid page__container">
                        <div class="row">
                            @if(Auth::user()->user_type == 1)
                            <div class="card card-form col-lg-4">
                                <div class="row no-gutters">
                                   
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="category_form">
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="category" 
                                                       id="category" 
                                                       placeholder="Enter Category ..">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image</label>
                                                <span style="color:red">1080 x 1080 px</span>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image"
                                                       id="file" 
                                                       placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                            </div>
                                            <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image">
                                           
                                            <button type="submit"
                                                    class="btn btn-primary" id="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="card card-form col-lg-{{(Auth::user()->user_type == 1)?'7  offset-1':'12'}}">
                                <div class="row no-gutters">
                                    
                                    <div class="col-lg-12 card-form__body">

                                        <div class="table-responsive border-bottom"
                                             data-toggle="lists"
                                             data-lists-values='["js-lists-values-employee-name"]'>

                                            <table class="table mb-0 thead-border-top-0" id="cat_datatable">
                                                <thead>
                                                    <tr class="userDatatable-header">
                                                        <th>#</th>

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
<script src="{{url('admin_assets/custom_js/blog_category.js')}}"></script>

@endsection