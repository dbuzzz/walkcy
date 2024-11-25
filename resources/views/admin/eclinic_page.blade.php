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
                                            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home </a></li>
                                            <li class="breadcrumb-item active"
                                                aria-current="page">E-clinic Page-Management</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">E-clinic Page-Management</h1>
                                </div>
                               {{--  <a href="#"
                                   class="btn btn-success ml-3">Add Product</a> --}}
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
                                            <div class="form-group col-lg-12">
                                                <label for="exampleInputEmail1">Heading</label>
                                                <textarea class="form-control"
                                                       name="heading" 
                                                       id="heading" 
                                                       placeholder="Enter heading .."></textarea>
                                              
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Sub-Heading</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="subheading" 
                                                       id="subheading" 
                                                       placeholder="Enter subheading ..">
                                            </div>

                                            <div class="form-group col-lg-6">
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

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Banner</label>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image"
                                                       id="file" 
                                                       placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="col-lg-6">
                                                <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Image1</label>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image1"
                                                       id="file1" 
                                                       placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="col-lg-6">
                                                <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image1">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">Image2</label>
                                                <input type="file"
                                                       class="form-control"
                                                       name="image2"
                                                       id="file2" 
                                                       placeholder="Enter Category .." accept=".jpg,.png,.jpeg">
                                            </div>
                                            <div class="col-lg-6">
                                                <img style=" padding: 11px; width: 265px; height: 185px; " src="{{asset('uploads/default/default-image.jpg')}}" id="image2">
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

                                                        <th >Heading</th>

                                                        <th >Sub-Heading</th>
                                                        <th >Category</th>
                                                        <th >Banner</th>

                                                        <th >Image1</th>

                                                        <th >Image2</th>
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
<script src="{{url('admin_assets/custom_js/e_clinic.js')}}"></script>

@endsection