	@section('content')
	@include('event_user.include.head')


	<body class="posted_event_n">
		<!--wrapper-->
		<div class="wrapper">
		 <!--start header -->
			@include('event_user.include.header')
		 <!--end header -->
		 
			 <!--start page wrapper -->
			<div class="setting-page-wrapper posted-event-wrapper">
				<div class="d-flex align-items-center mb-4 row">
				   <div class="setting-page-logo d-none d-md-none d-lg-block"><img src="{{url('/img/black-logo.png')}}" class="logo-icon" alt="logo icon"></div>
				   <div class="col-md-3">
					  <h3 class="mb-0 mt-4 pt-3">Posted Event</h3>
				   </div>
				   <div class="col-md-9">
					  <div class="d-flex justify-content-end align-items-center side-filter-wrap mb-0 mt-4 pt-3">
						<form method="get" action="posted_event">
						 <div class="input-group input-group-merge">
							<input name="search" type="text" value="{{request('search')}}" placeholder="SEARCH"class="form-control form-control-prepended">
							<div class="input-group-prepend">
							   <div class="input-group-text">
								  <span class="bx bx-search"></span>
							   </div>
							</div>
						 </div>
						</form>
					
					  </div>
				   </div>
				</div>
				<div class="row justify-content-space">
				   <div class="col-md-12 mt-2">
					  <div class="table-responsive posted_events_list">
						<?php //echo"<pre>"; print_r($event_data); die; ?>
						
						@if(!$event_data->isEmpty())
						 <table class="table align-middle mb-0 table-striped-custom">
							<thead>
							   <tr>
								  <th>Events</th>
								  <th>Event TIme</th>
								  
								  <th>Status</th>
								  <th></th>
							   </tr>
							</thead>
							<tbody>
							
							@foreach($event_data as $event_key => $event_val_n)
								<?php $url = url('/images');
								$img_nm = $event_val_n->event_image;
								$imgurl = $url.'/'.$img_nm; 
								?>
								<tr>
								  <td>
									 <div class="d-flex align-items-center">
										<div class="recent-product-img">
										   <img src="{{ $imgurl }}" alt="">
										</div>
										<div class="ms-2">
										   <h6 class="mb-0">{{$event_val_n->event_title}}</h6>
										   <p class="mb-0 font-14">Music event poster template with...</p>
										</div>
									 </div>
								  </td>
								  <td><span class="label-text">{{$event_val_n->event_time}}</td>
								  
								  <input type="hidden" id="event_{{$event_val_n->id}}" value="{{$event_val_n->id}}" />
									@if($event_val_n->status =='0' || $event_val_n->status =='')    
										<td><span class="text-success">Inactive</span></td>
										<td><button attr_id="{{$event_val_n->id}}" class="btn btn-warning postpond_event">Activate</button></td>
									
									@else
										<td><span class="text-success">Published</span></td>
										<td><button attr_id="{{$event_val_n->id}}" class="btn btn-warning postpond_event">Postpone</button></td>
									@endif
								  
							   </tr>
							@endforeach
							
							</tbody>
						 </table>
						 <div style="text-align:center;" class="pagination_driver">{{ 	$event_data->links("pagination::bootstrap-4") }}</div>
								</div>
						 @else
							Sorry, No event Exist.....
						@endif
						
					  </div>
				   </div>
				</div>
			</div>
         <!--end page wrapper -->
		 
		</div>
		@include('includes.footer')
	</body>
	