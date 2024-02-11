@extends('layout')

	@section('content')
	@include('event_user.include.head')


	<body>
		<!--wrapper-->
		<div class="wrapper">
		 <!--sidebar wrapper -->
			@include('main_dashboard_sidebar')
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
                     <h3 class="mb-0"> <i class='bx bxs-dashboard text-orange'></i> Main Dashboard</h3>
                  </div>
               </div>
               <div class="dashboard-info-block dashboard-info-main">
                  <ul class="nav nav-tabs step-tab mb-5 d-flex" id="myTab" role="tablist">
                     <li class="nav-item w-25" role="presentation">
                        <a href="{{ route('dashboard.events') }}" class="nav-link bg-warning" id="stepone-tab" type="button"> 
							<img src="{{ url('/img/icons/icon01.png') }}" alt="#">
							<span> 
								<span class="total-artists-count fw-bold fs-4">Events Organizer</span>
							
							</span>
						</a>
                     </li>
                     <li class="nav-item w-25" role="presentation">
                        <a href="{{ route('dashboard.driver') }}" class="nav-link bg-warning" id="steptwo-tab" type="button" role="tab">
							<img src="{{ url('/img/icons/icon02.png') }}" alt="#">
							<span> 
								<span class="total-artists-count fw-bold fs-4" >Driver Dashboard</span>
					
							</span>
						</a>
                     </li>
                    
                     <li class="nav-item w-25" role="presentation">
						<a href="{{ route('dashboard.buyer') }}" class="nav-link bg-warning" id="stepone-tab" type="button"> 
							<img src="{{ url('/img/icons/icon03.png') }}" alt="#">
							<span>
								<span class="total-artists-count fw-bold fs-4"> Buyer Dashboard</span>
								
							</span>
						</a>
                     </li>
                  </ul>
               </div>
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade" id="steptwo" role="tabpanel" aria-labelledby="steptwo-tab">
                           <h3 class="mb-4">Total Events</h3>
                           <div class="table-responsive">
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Events</th>
                                       <th>Time</th>
                                       <!--<th>Sold</th>-->
                                       <th>Ticket Price</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
									<?php //echo"<pre>"; print_r($events_list); die; 
									$url = url('/images');
									?>
									@foreach($events_list as $event_l)
										<?php $img_nm = $url.'/'.$event_l->event_image; ?>
										<tr>
											<td>
												<div class="d-flex align-items-center">
												 <div class="recent-product-img">
													<img src="{{$img_nm}}" alt="">
												 </div>
												 <div class="ms-2">
													<h6 class="mb-0">{{$event_l->event_title}}</h6>
													<p class="mb-0 font-14">{{$event_l->about_event}}</p>
												 </div>
												</div>
											</td>
											<td>
											@php echo date("d/m/Y g:i a", strtotime($event_l->event_time));  @endphp
											</span></td>
											<!--<td>8/0</td>-->
											
											@foreach (json_decode($event_l->ticket_details) as $tickey => $ticinfo)
												@if($tickey==0)
													<td>{{ $ticinfo->price }}</td> 
												@endif
												 
											@endforeach
											<td><span class="text-success">Published</span></td>
										</tr>
									@endforeach
								 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="stepthree" role="tabpanel" aria-labelledby="stepthree-tab">
                           <h3 class="mb-4">Total Sold</h3>
                           <div class="table-responsive">
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Events</th>
                                       <th>Time</th>
                                       <!--<th>Sold</th>-->
                                       <th>Total Earned</th>
                                    </tr>
                                 </thead>
                                  <tbody>
									@foreach ($sold_events as $sold_eve)
										<tr>
											<td>{{ $sold_eve->event_title }}</td> 
											
											<td>
											@php echo date("d/m/Y g:i a", strtotime($sold_eve->event_time));  @endphp
											</span></td>
											<td>@money($sold_eve->total)</td> 
										</tr>
									@endforeach
                                 </tbody>
                              </table>
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
	