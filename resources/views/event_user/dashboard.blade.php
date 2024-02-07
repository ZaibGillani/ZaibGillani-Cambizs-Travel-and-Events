Admin User@extends('layout')

	@section('content')
	@include('event_user.include.head')


	<body>
		<!--wrapper-->
		<div class="wrapper">
		 <!--sidebar wrapper -->
			@include('event_user.include.sidebar')
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
						
                        <button class="nav-link active " id="stepone-tab" data-bs-toggle="tab" data-bs-target="#stepone" type="button" role="tab" aria-controls="steptwo" aria-selected="false"><img src="{{ url('/img/icons/icon01.png') }}" alt="#"><span> <span class="total-artists-count"></span><span class="label-text">Artist information</span></span></button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="steptwo-tab" data-bs-toggle="tab" data-bs-target="#steptwo" type="button" role="tab" aria-controls="steptwo" aria-selected="false"><img src="{{ url('/img/icons/icon02.png') }}" alt="#"><span> <span class="total-artists-count">{{$total_events}}</span><span class="label-text">Toal Events</span></span></button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="stepthree-tab" data-bs-toggle="tab" data-bs-target="#stepthree" type="button" role="tab" aria-controls="stepthree" aria-selected="false"><img src="{{ url('/img/icons/icon03.png') }}" alt="#"><span> 
						<span class="total-artists-count">
							@if(isset($total_sold_events->ticket_total_price))
								@money($total_sold_events->ticket_total_price)
							@else
								@money(0)
							@endif
							
						</span><span class="label-text">Toal Sold</span></span></button>
                     </li>
                  </ul>
               </div>
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stepone" role="tabpanel" aria-labelledby="stepone-tab">
                           <h3 class="mb-4">Artist Information</h3>
                           <div class="table-responsive">
							@if(!$event_users->isEmpty())
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Total Events</th>
                                       <th>Total Earned</th>
                                    </tr>
                                 </thead>
                                 <tbody>
									<?php //echo "<pre>"; print_r($event_users); die; ?>
									@foreach($event_users as $event)
										<tr>
										   <td>
											  <div class="d-flex align-items-center">
												 
												 <div class="ms-2">
													<h6 class="mb-0">{{$event->name}}</h6>
												 </div>
											  </div>
										   </td>
										   <td>
											  <div class="d-flex align-items-center">
												 
												 <div class="ms-2">
													<h6 class="mb-0">{{$event->email}}</h6>
												 </div>
											  </div>
										   </td>
										   <td><a target='_blank' href="{{url('/posted_event')}}?artist_id={{$event->user_id}}">{{$event->total}}</td>
										  
											@if(isset($user_order_pricing[$event->user_id]))
												<td>@money($user_order_pricing[$event->user_id])</td>
											@else
												<td>@money(0)</td>
											@endif
										   
										   <td></td>
										</tr>
									@endforeach
                                 </tbody>
                              </table>
							  @else
								No information found  
							  @endif
                           </div>
                        </div>
                        <div class="tab-pane fade" id="steptwo" role="tabpanel" aria-labelledby="steptwo-tab">
                           <h3 class="mb-4">Total Events</h3>
                           <div class="table-responsive">
							@if(!$events_list->isEmpty())
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
													<td>@money($ticinfo->price)</td> 
												@endif
												 
											@endforeach
											<td><span class="text-success">Published</span></td>
										</tr>
									@endforeach
								 
                                 </tbody>
                              </table>
							  @else
								No, Information found  
							  @endif
                           </div>
                        </div>
                        <div class="tab-pane fade" id="stepthree" role="tabpanel" aria-labelledby="stepthree-tab">
                           <h3 class="mb-4">Total Sold</h3>
                           <div class="table-responsive">
							@if(!$sold_events->isEmpty())
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
							  @else
								Sorry, No information found  
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
	