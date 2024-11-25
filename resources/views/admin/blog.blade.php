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
                                                aria-current="page">Blog-Management</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">Blog-Management</h1>
                                </div>
                               {{--  <a href="#"
                                   class="btn btn-success ml-3">Add Product</a> --}}
                            </div>
                        </div>

                        <div class="container-fluid page__container">
                        <div class="row">
                            <div class="card card-form col-lg-12">
                                <div class="row no-gutters">
                                   -
                                    <div class="col-lg-12 card-form__body card-body">
                                        <form id="save_form">
                                            <input type="hidden" name="id" id="id" value="{{@$product->id}}">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputEmail1">Blog Title</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="name" 
                                                           id="name" 
                                                           placeholder="Enter Name .."
                                                           value="{{@$product->name}}">
                                                </div>

                                                <div class="form-group col-lg-4">
                                                    <label for="cat">Category</label>
                                                    <select id="cat"
                                                            
                                                            class="form-control" name="cat">
                                                        <option value="">Select option</option>
                                                        @if(!empty($cat))
                                                        @foreach($cat as $key=>$value)
                                                        <option value="{{$value->id}}" {{@$product->cat_id == $value->id?'selected':''}}>{{$value->name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-12 pb-4">
                                                    <label for="exampleInputEmail1">Product Description</label>
                                                    <div id="editor">
                                             {!!@$product->description!!}
                                            
                                        </div>
                                                    
                                                </div>
                                               
                                                <div class="form-group col-lg-6 pt-4 mt-4">
                                                    <label for="exampleInputEmail1">Featured Image</label><span style="color:red">1080 x 1080 px</span>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image"
                                                           id="file" 
                                                           accept=".jpg,.png,.jpeg">
                                                </div>

                                                <div class="form-group col-lg-6 pt-4 mt-4">
                                                    <img style=" padding: 11px; width: 265px; height: 185px; " src="{{!empty($product)?$product->image:asset('uploads/default/default-image.jpg')}}" id="image">
                                                </div>

                                            </div>
                                           
                                            <button type="submit"
                                                    class="btn btn-primary" id="submit">Submit</button>
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

                                                        <th >Title</th>
                                                        <th >Category</th>
                                                        <th >Description</th>

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
<script src="{{url('admin_assets/custom_js/blog.js')}}"></script>

@endsection