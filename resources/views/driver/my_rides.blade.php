Admin User@extends('layout')

	@section('content')
	@include('event_user.include.head')


	<body>
		<!--wrapper-->
		<div class="wrapper">
		 <!--sidebar wrapper -->
			@include('driver.include.sidebar')
		 <!--end sidebar wrapper -->
		 <!--start header -->
			@include('event_user.include.header')
		 <!--end header -->
		   <!--start page wrapper -->
         <div class="page-wrapper">
            <div class="page-content">
               <div class="d-flex align-items-center mb-4 pb-2">
                  <div>
                     <h3 class="mb-0"> <i class='bx bxs-dashboard text-orange'></i> My Rides</h3>
                  </div>
               </div>
              
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stepone" role="tabpanel" aria-labelledby="stepone-tab">
                          
                           <div class="table-responsive">
							@if(!$ride_info->isEmpty()) 
								
								<table class="table align-middle mb-0 table-striped-custom accordion" id="accordionExample">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Pick Up From</th>
                                       <th>Drop Location</th>
                                       <th></th>
                                       <th>Total Seats</th>
                                       <th>Luggage (kg)</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
									@foreach($ride_info as $ride_key => $ride_val)
										
										<tr>
										   <td>
											  <div class="d-flex align-items-center">
												 <div class="ms-2">
													<h6 class="mb-0">Alex Wilson</h6>
												 </div>
											  </div>
										   </td>
										   <td>{{$ride_val->pickup_location}}</td>
										   <td>{{$ride_val->drop_location}}</td>
										   <td colspan="2"><span class="text-warning">{{$ride_val->journey_type}}</span></td>
										   <td colspan="2" class="confirm-status">Confirmed</td>
										</tr>
									@endforeach
									
                                 </tbody>
                              </table>
							  
							  {{$ride_info->links("pagination::bootstrap-4")}}
							@else
								Sorry, No rides available
							@endif
                              
                           </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end page wrapper -->
		</div>
		@include('includes.footer')
	</body>
	