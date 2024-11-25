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
                                                aria-current="page">Contact Page</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Contact Page</h1>
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
                                            <input type="hidden" name="id" id="id" value="{{@$data->id}}">
                                            
                                            <div class="form-group col-lg-12 p-5">
                                                    <label for="exampleInputEmail1">Location</label>
                                                    <div id="editor">
                                                        {!!@$data->location!!}
                                            </div>
                                                    
                                            </div>

                                            <div class="form-group col-lg-12 p-5">
                                                    <label for="exampleInputEmail1">Mail</label>
                                                    <div id="editor1">
                                                        {!!@$data->mail!!}
                                            </div>
                                                    
                                            </div>

                                            <div class="form-group col-lg-12 p-5">
                                                    <label for="exampleInputEmail1">Contact</label>
                                                    <div id="editor2">
                                                        {!!@$data->contact!!}
                                            </div>
                                                    
                                            </div>

                                            <button type="submit"
                                                    class="btn btn-primary mt-5" id="submit">Submit</button>
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

                                                        <th >Customer</th>
                                                     
                                                        <th >Info</th>
                                                        <th >Contact</th>
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
<script src="{{url('admin_assets/custom_js/contactpage.js')}}"></script>

@endsection