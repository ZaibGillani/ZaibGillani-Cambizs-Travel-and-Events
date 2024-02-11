@extends('layout')

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
                     <h3 class="mb-0"> <i class='bx bxs-dashboard text-orange'></i> Dashboard</h3>
                  </div>
               </div>
               <div class="dashboard-info-block">
                  <ul class="nav nav-tabs step-tab mb-5" id="myTab" role="tablist">
                     <li class="nav-item" role="presentation">
						
                        <button class="nav-link active " id="stepone-tab" data-bs-toggle="tab" data-bs-target="#stepone" type="button" role="tab" aria-controls="steptwo" aria-selected="false"><img src="{{ url('/img/icons/icon01.png') }}" alt="#"><span> <span class="total-artists-count">{{$total_drivers}}</span><span class="label-text">Toal Drivers</span></span></button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="steptwo-tab" data-bs-toggle="tab" data-bs-target="#steptwo" type="button" role="tab" aria-controls="steptwo" aria-selected="false"><img src="{{ url('/img/icons/icon02.png') }}" alt="#"><span> <span class="total-artists-count">{{$total_rides}}</span><span class="label-text">Toal Rides</span></span></button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="stepthree-tab" data-bs-toggle="tab" data-bs-target="#stepthree" type="button" role="tab" aria-controls="stepthree" aria-selected="false"><img src="{{ url('/img/icons/icon03.png') }}" alt="#"><span> <span class="total-artists-count">
							@if($total_ride_price[0]->booking_price=='')
								0
							@else
								@money($total_ride_price[0]->booking_price)
								
							@endif
						</span><span class="label-text">Toal Sold</span></span></button>
                     </li>
                  </ul>
               </div>
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stepone" role="tabpanel" aria-labelledby="stepone-tab">
                           <h3 class="mb-4">Total Drivers</h3>
						   @if(!$driver_rides->isEmpty())
                           <div class="table-responsive">
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Total Rides</th>
                                       <th>Total Earned</th>
                                    </tr>
                                 </thead>
                                 <tbody>
									
									@foreach($driver_rides as $rides)
										<tr>
										   <td>
											  <div class="d-flex align-items-center">
												 <div class="recent-product-img">
													AW
												 </div>
												 <div class="ms-2">
													<h6 class="mb-0">{{$rides->name}}</h6>
												 </div>
											  </div>
										   </td>
										   <td>{{$rides->email}}</td>
										   <td>{{$rides->total}}</td>
										   <td>@money($rides->price_total)</td>
										</tr>
									@endforeach
                                 </tbody>
                              </table>
                           </div>
						  
						   @else
							   Sorry, No ride information found
						   @endif
                        </div>
                        <div class="tab-pane fade" id="steptwo" role="tabpanel" aria-labelledby="steptwo-tab">
                           <h3 class="mb-4">Total Events</h3>
                           <div class="table-responsive">
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Pickup Location</th>
                                       <th>Drop Location</th>
                                       <th>Ride Date</th>
                                       <th>Journey Type</th>
                                       <th>Price</th>
                                    </tr>
                                 </thead>
                                 <tbody>
									<?php //echo"<pre>"; print_r($events_list); die; 
									$url = url('/images');
									?>
									@foreach($ride_list as $listing)
										
										<tr>
											<td>
												<div class="d-flex align-items-center">
											
												 <div class="ms-2">
													<h6 class="mb-0">{{$listing->pickup_location}}</h6>
												 </div>
												</div>
											</td>
											<td>{{$listing->drop_location}}</td>
											
											<td>{{$listing->journey_date}}</td>
											<td>{{$listing->journey_date}}</td>
											<td>@money($listing->price)</td>
										</tr>
									@endforeach
								 
                                 
                                 </tbody>
                              </table>
                           </div>
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
								Sorry, No Ride information found
						   @endif
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
	