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
                                                aria-current="page">INFO</li>
                                        </ol>
                                    </nav>
                                    <h1 class="m-0">INFO</h1>
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
                                                    <label for="exampleInputEmail1">Heading</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="heading" 
                                                           id="heading" 
                                                           placeholder="Enter heading .."
                                                           value="{{@$product->heading}}">
                                                </div>


                                                <div class="form-group col-lg-6">
                                                    <label for="exampleInputEmail1">Price</label>
                                                    <input type="number"
                                                           class="form-control"
                                                           name="price" 
                                                           id="price" 
                                                           placeholder="Enter price .."
                                                           value="{{@$product->price}}">
                                                </div>


                                                <div class="form-group col-lg-12 pb-4">
                                                    <label for="exampleInputEmail1">Product Description</label>
                                                    <div id="editor">
                                             {!!@$product->description!!}
                                            
                                                </div>
                                                    
                                                </div>
                                               
                                                <div class="form-group col-lg-6 pt-4 mt-4">
                                                    <label for="exampleInputEmail1">Featured Image</label>
                                                    <input type="file"
                                                           class="form-control"
                                                           name="image"
                                                           id="file" 
                                                           accept=".jpg,.png,.jpeg">
                                                </div>

                                                <div class="form-group col-lg-6 pt-4 mt-4">
                                                    <img style=" padding: 11px; width: 265px; height: 185px; " src="{{!empty($product->image)?$product->image :asset('uploads/default/default-image.jpg')}}" id="image">
                                                </div>

                                            </div>
                                           
                                            <button type="submit"
                                                    class="btn btn-primary" id="submit">{{!empty($product->image)?'Update':'Submit'}}</button>
                                        </form>
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
<script src="{{url('admin_assets/custom_js/doctor_info.js')}}"></script>


@endsection