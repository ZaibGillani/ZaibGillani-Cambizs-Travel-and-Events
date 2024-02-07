Admin User@extends('layout')

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
                     <h3 class="mb-0"> <i class='bx bxs-dashboard text-orange'></i> View Artist Information</h3>
                  </div>
               </div>
			   
			   @if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif
			   
			   <form id="post_ride_form" method="post" action="{{ route('update_driver') }}">
			   @csrf			   
					<input type="hidden" name="id" value="{{$user->id}}" />
					<div class="payout-info-block">
						<div class="card radius-10 bg-light-primary">
							<div class="card-body">
								<div class="col-md-8 col-lg-9">
									<div id="floating-panel">								
										<label>Name</label>
										<input type="text" value="{{$user->name}}" name="name" class="form-control" id="#">
									</div>
								</div>
								<br/>
								<div class="col-md-8 col-lg-9">
									<div id="floating-panel">								
										<label>Email</label>
										<input readonly type="text" value="{{$user->email;}}" name="email" class="form-control" id="#">
									</div>
								</div><br/>
								<div class="col-md-8 col-lg-9">
									<div id="floating-panel">
										
										<button type="submit" class="btn btn-warning px-5">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
         </div>
         <!--end page wrapper -->
		</div>
		@include('includes.footer')
	</body>
	