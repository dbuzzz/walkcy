@extends('frontend.layout')
@section('extern-css')
 <link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('plugins/fullcalendar/main.css') }}">
 
@endsection
@section('content')



	<!-- Start Breadcrumb Area -->
{{-- 	<section class="breadcrumb-area pt-100 pb-100" style="background-image:url('{{@$genral_pages->banner}}');">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb-content">
						<h2>Blog</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><i class="fas fa-angle-double-right"></i></li>
							<li>Blog</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Breadcrumb Area -->

	<section class="section-padding">

		<div class="container">
			<button onclick="show_modal()" class="btn btn-primary float-right" id="btn_add"><i class="fa fa-check-circle"></i> Book</button>
			<div class="row">
				<!-- Single -->
				<div class="col-md-10 offset-1">
					<div id="calendara"></div>
				</div>
				
			</div>
		
		</div>
	</section>

	<!-- Start Subscribe Form -->

<div class="modal fade" id="event_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title m-0" >Add Event</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_event">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="form-group col-12">
                            <p class="m-1">Title</p>
                            <input type="text" class="form-control" id="title" name="title" placeholder="EnterTitle">
                        </div> 
                      
                        <div class="form-group col-6">
                            <p class="m-1" for="start_date">Date</p>
                            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter city">
                        </div> 
                        <div class="form-group col-6">
                            <p class="m-1" for="deadline">Time</p>
                            <input type="time" class="form-control" id="start_time" name="start_time">
                        </div>
                  
                        <div class="col-sm-12" id="set"></div>
                     
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-primary" id="btn_add"><i class="fa fa-check-circle"></i> Add</button>
                    <button type="button" style=" display: none; " class="btn btn-danger" id="btn_delete"><i class="fa fa-delete"></i> Delete</button>
                </div>
            </form>   
            <div class="modal-mask"></div> 
        </div>
    </div>
</div>


<script type="text/javascript">
    EventData = '<?php echo !empty($event)?json_encode($event):''?>';
</script>


@endsection
@section('extern-js')

<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{url('plugins/fullcalendar/main.js')}}"></script>
<script src="{{url('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/calendar.js')}}"></script>
@endsection