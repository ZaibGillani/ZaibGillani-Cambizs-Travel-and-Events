@section('content')
	@include('event_user.include.head')


	<body>
		<!--wrapper-->
		<div class="wrapper">
		 <!--sidebar wrapper -->
			@include('admin.include.sidebar')
		 <!--end sidebar wrapper -->
		 <!--start header -->
			@include('event_user.include.header')
		 <!--end header -->
		 <!--start page wrapper -->
		  <!--start page wrapper -->
         <div class="page-wrapper">
			<?php //echo"<pre>"; print_r($event_users); die; ?>
			
            <div class="page-content">
               <div class="d-flex align-items-center mb-4 pb-2">
                  <div>
                     <h3 class="mb-0"> <i class='bx bxs-dashboard text-orange'></i> Driver Profile(<a target="_blank" href="view_driver_profile_admin/{{$get_driver->id}}">Driver Information</a>)</h3>
                  </div>
			
               </div>
			   @if(session()->has('user_update'))
					<div class="alert alert-success">
						{{ session()->get('user_update') }}
					</div>
				@endif
			   <div class="d-flex align-items-center mb-4 pb-2">

				  <div>
                     <p class="mb-0"> Total Rides: {{$total_rides}}</p>
                     <p class="mb-0"> Total Income: {{$ride_total->booking_price}}</p>
                  </div>
               </div>
			   
			   <form action="{{ route('save_driver_admin') }}" method="post">
				@csrf
					<input type="hidden" name="id" value="{{$get_driver->id}}" />
				   <div class="col-sm-12 col-md-2 pr-0">
					  <label class="pl-10">Name</label>
					  <div class="input-group input-group-merge">
						 <input id="name" type="text" name="name" value="{{$get_driver->name}}" class="form-control form-control-prepended"/>
					  </div>
				   </div><br/>
				   <div class="col-sm-12 col-md-2 pr-0">
					  <label class="pl-10">Email</label>
					  <div class="input-group input-group-merge">
						 <input readonly id="email" type="text" value="{{$get_driver->email}}" name="email" class="form-control form-control-prepended"/>
					  </div>
				   </div><br/>
				   
				   
				  
					<div class="col-sm-12 col-md-2">
						<button type="submit"  data-bs-toggle="modal" class="btn btn-warning px-4">Submit</button>
					</div>
				</form>
               
            </div>
         </div>
         <!--end page wrapper -->
		</div>
		@include('includes.footer')
	</body>
	