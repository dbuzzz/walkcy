@extends('admin.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content') 

                    <div class="mdk-drawer-layout__content">

                        <div style="padding-bottom: calc(5.125rem / 2); position: relative; margin-bottom: 1.5rem;">
                            <div 
                                 style="min-height: 40px;">
                                <div class="d-flex align-items-end container-fluid page__container"
                                     style="position: absolute; left: 0; right: 0; bottom: 0;">
                                    <div class="avatar avatar-xl">
                                        <img src="{{!empty($data->image)?Auth::user()->image:asset('uploads/default/default-image.jpg')}}"
                                             alt="avatar"
                                             class="avatar-img rounded"
                                             style="border: 2px solid white;">
                                    </div>
                                    <div class="card-header card-header-tabs-basic nav flex"
                                         role="tablist">
                                        <a href="#activity"
                                           class="active show"
                                           data-toggle="tab"
                                           role="tab"
                                           aria-selected="true">Information</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid page__container">
                            <div class="row">
                                <div class="col-lg-3 card p-4">
                                    <h1 class="h4 mb-1">{{$data->name}}</h1>
                                    <p class="text-muted">{{$data->email}}</p>
                                    <p>{{$data->mobile}}</p>
                                    @if($category)
                                    @foreach($category as $key=>$value)
                                    <p>{{$value}} :- {{$vendor_commision[$key]}}</p>
                                    @endforeach

                                    @endif
                                </div>
        <div class="col-lg-9">
            <div class="tab-content">
                <div class="tab-pane active"
                     id="activity">
                     @if(!empty($extra_info))
                    <div class="card">
                        <div class="px-4 py-3">
                            <div class="d-flex mb-1">
                                <div class="flex">
                                
                                @foreach($extra_info as $key=>$value)
                                @if($key == 'token' or $key == '_token')
                                @else
                                
                                    <div class="d-flex align-items-center mb-1">
                                        <strong class="text-15pt">{{$key}}</strong>&nbsp;&nbsp;&nbsp;
                                        <p class="mt-3">{{$value}}</p>
                                    </div>
                                @endif
                                  
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(!empty($extra_file))
                    <div class="card">
                        <div class="px-4 py-3">
                            <div class="d-flex mb-1">
                                
                                <div class="flex">
                               
                                @foreach($extra_file as $key=>$value)
                                @if($key == 'token' or $key == '_token')
                                @else
                                
                                    <div class="d-flex align-items-center mb-1 m-4">
                                        <strong class="text-15pt">{{$key}}</strong>&nbsp;&nbsp;&nbsp;
                                        <a href="{{$value}}" target="_blank"><img style="width:200px" src="{{$value}}"></a>
                                    </div>
                                @endif
                                  
                                @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

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
<script src="{{url('admin_assets/custom_js/taxation.js')}}"></script>

@endsection