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
                                                aria-current="page">Attribute</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Attribute</h1>
                                </div>
                               
                            </div>
                        </div>

                        <div class="container-fluid page__container">
                        <div class="row">
                            <div class="card card-form col-lg-4">
                                <div class="row no-gutters">
                                   
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="save_form">
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Name</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="title" 
                                                       id="title" 
                                                       placeholder="Enter title ..">
                                            </div>

                                            <div class="form-group">
                                                <select  class="form-control" name="type" id="type">
                                        <option value="">Choose Options</option>
                                        <option value="text">Text</option>
                                        <option value="number">Number</option>
                                        <option value="email">Email</option>
                                        <option value="password">Password</option>
                                        <option value="radio">Radio</option>
                                        <option value="file">File</option>
                                        <!-- <option value="dropdown">Dropdown</option>
                                        <option value="textarea">Textarea</option> -->
                                       {{--  <option value="tag">Tag</option>
                                        <option value="multiSelect">MultiSelect</option> 
                                        --}}
                                        <option value="checkbox">Checkbox</option>
                                    </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Required</label>
                                                <input type="checkbox"
                                                       value="1" 
                                                       name="is_required" 
                                                       id="is_required" 
                                                       placeholder="Enter Category ..">
                                            </div>
                                           
                                            <button type="submit"
                                                    class="btn btn-primary" id="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-form col-lg-7 offset-1">
                                <div class="row no-gutters">
                                    
                                    <div class="col-lg-12 card-form__body">

                                        <div class="table-responsive border-bottom"
                                             data-toggle="lists"
                                             data-lists-values='["js-lists-values-employee-name"]'>

                                            <table class="table mb-0 thead-border-top-0" id="cat_datatable">
                                                <thead>
                                                    <tr class="userDatatable-header">
                                                        <th>#</th>

                                                        <th >Attribute</th>
                                                        <th >Type</th>
                                                        <th >Required</th>
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
<script src="{{url('admin_assets/custom_js/attribute.js')}}"></script>

@endsection