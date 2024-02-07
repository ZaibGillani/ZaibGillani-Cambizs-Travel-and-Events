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
                     <h3 class="mb-0"> <i class='bx bxs-dashboard text-orange'></i> Dashboard</h3>
                  </div>
               </div>
               <div class="dashboard-info-block">
                  <ul class="nav nav-tabs step-tab mb-5" id="myTab" role="tablist">
                     <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="stepone-tab" data-bs-toggle="tab" data-bs-target="#stepone" type="button" role="tab" aria-controls="steptwo" aria-selected="false"><img src="{{ url('/images/driver/icons/icon01.png') }}" alt="#"><span> <span class="total-artists-count">
						@if($today_earning[0]->booking_price=='')
							0
						@else
							@money($today_earning[0]->booking_price)
							
						@endif
						</span><span class="label-text">Today's Earning</span></span></button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="steptwo-tab" data-bs-toggle="tab" data-bs-target="#steptwo" type="button" role="tab" aria-controls="steptwo" aria-selected="false"><img src="{{ url('/images/driver/icons/icon02.png') }}" alt="#"><span> <span class="total-artists-count">{{$total_rides}}</span><span class="label-text">Toal Rides</span></span></button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="stepthree-tab" data-bs-toggle="tab" data-bs-target="#stepthree" type="button" role="tab" aria-controls="stepthree" aria-selected="false"><img src="{{ url('/images/driver/icons/icon03.png') }}" alt="#"><span> <span class="total-artists-count">
						<?php //echo"<pre>"; print_r($total_ride_price); echo"</pre>"; echo $total_ride_price[0]->booking_price; //die; ?>
						@if($total_ride_price[0]->booking_price=='')
							0
						@else
							@money($total_ride_price[0]->booking_price)
							
						@endif
						</span><span class="label-text">Toal Earnings</span></span></button>
                     </li>
                  </ul>
               </div>
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stepone" role="tabpanel" aria-labelledby="stepone-tab">
                           <h3 class="mb-4">Today's Rides</h3>
                           <div class="table-responsive">
							@if(!$today_ride->isEmpty())
                              <table class="table align-middle mb-0 table-striped-custom accordion" id="accordionExample">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Pick Up From</th>
                                       <th>Drop Location</th>
                                       <th>Seat Number</th>
                                       <th>Price</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    
                                    <tr id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                       <td class="p-0 drop-collapse-table" colspan="7">
                                          <table class="table align-middle p-2">
                                             <thead>
                                                <tr>
                                                   <th>Pessenger Named</th>
                                                   <th>Pick Up From</th>
                                                   <th>Drop Location</th>
                                                   <th>Seat Number</th>
                                                   <th>Luggage (kg)</th>
                                                   <th>Status</th>
                                                </tr>
                                             </thead>
                                             
                                          </table>
                                       </td>
                                    </tr>
									<?php //echo"<pre>"; print_r($today_ride); die;?>
									
										@foreach($today_ride as $ride_ava)
											<tr>
											   <td>
												  <div class="d-flex align-items-center">
													 <div class="recent-product-img">
														
													 </div>
													 <div class="ms-2">
														<h6 class="mb-0">{{$ride_ava->name}}</h6>
													 </div>
												  </div>
											   </td>
											   <td>{{$ride_ava->pickup_location}}</td>
											   <td>{{$ride_ava->drop_location}}</td>
											   <td>{{$ride_ava->booking_seat}}</td>
											   <td>@money($ride_ava->booking_price)</td>
											   
											</tr>
										@endforeach
										 
                                 </tbody>
                              </table>
							  
							@else
								<div class="d-flex align-items-center">
									Sorryf, No ride available
								</div>
										 
							@endif
                           </div>
                        </div>
                        <div class="tab-pane fade" id="steptwo" role="tabpanel" aria-labelledby="steptwo-tab">
                           <h3 class="mb-4">Total Rides</h3>
						   @if(!$total_rides_overall->isEmpty())
							    <div class="table-responsive">
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Pickup Location</th>
                                       <th>Drop Location</th>
                                       <th>Ride Date</th>
                                       <th>Journey Type</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 
									@foreach($total_rides_overall as $ride_ava)
										<tr>
										   
										   <td>{{$ride_ava->pickup_location}}</td>
										   <td>{{$ride_ava->drop_location}}</td>
										   <td>{{$ride_ava->journey_date}}</td>
										   <td>{{$ride_ava->journey_type}}</td>
										   
										</tr>
									@endforeach
                                   
								  
                                 </tbody>
                              </table>
								<div style="text-align:center;" class="pagination_driver">{{ 	$total_rides_overall->links("pagination::bootstrap-4") }}</div>
								</div>
						   @else
							   Sorry, No rides available
						   @endif
                          
                        </div>
                        <div class="tab-pane fade" id="stepthree" role="tabpanel" aria-labelledby="stepthree-tab">
                           <h3 class="mb-4">Total Sold</h3>
						   @if(!$total_ride_earning->isEmpty())
								<div class="table-responsive">
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Pickup From</th>
                                       <th>Drop Location</th>
                                       <th>Seat Number</th>
                                       <th>Price</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($total_ride_earning as $ride_ava)
										<tr>
										   <td>
											  <div class="d-flex align-items-center">
												
												 <div class="ms-2">
													<h6 class="mb-0">{{$ride_ava->name}}</h6>
												 </div>
											  </div>
										   </td>
										   <td>{{$ride_ava->pickup_location}}</td>
										   <td>{{$ride_ava->drop_location}}</td>
										   <td>{{$ride_ava->booking_seat}}</td>
										   <td>@money($ride_ava->booking_price)</td>
										   
										</tr>
									@endforeach
                               
                                   
                                 </tbody>
                              </table>
							  
                           </div>
						   @else
							   
						   @endif
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end page wrapper -->
		</div>
		<style>
			.pagination_driver nav{
				display:inline-block;
			}
		</style>
		@include('includes.footer')
	</body>
	