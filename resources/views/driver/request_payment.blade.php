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
                     <h3 class="mb-0"> <i class='bx bx-collection text-orange'></i> Request Payments</h3>
                  </div>
               </div>
               <div class="payment-info-block">
                  <div class="card radius-10 bg-light-primary">
                     <div class="card-body">
						@if(!$request_payment->isEmpty()) 
						@if(session()->has('message'))
							<div class="alert alert-success">
								{{ session()->get('message') }}
							</div>
						@endif
                        <div class="table-responsive">
							
                           <table class="table align-middle mb-0 table-striped-custom">
                              <thead>
                                 <tr>
                                    <th>Ride</th>
                                    <th>Date</th>
                                    <th>Money</th>
                                    <th>Pessanger Name</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
									
									
									@foreach($request_payment as $key => $payment)
										<form action="{{ route('request_payment_submit') }}" method="post" class="row g-3">
										@csrf
										<input type="hidden" name="ride_id" value="{{$payment->ride_id}}" />
										<input type="hidden" name="user_id" value="{{$payment->driver_id}}" />
										<input type="hidden" name="order_id" value="{{$payment->id}}" />
										<tr>
											<td>
												<div class="d-flex">
													<div class="start-ride d-flex me-3">
														<div class="me-2">
															<span class="circle-dot"></span><span class="text-muted">From</span>
														</div>
														<div><span class="text-dark fw-bolder">{{$payment->pickup_location}}</span></div>
													</div>
													<div class="seprator-dotted">- - - - -</div>
													<div class="end-ride d-flex ms-3">
														<div class="me-2">
															<span class="circle-dot"></span><span class="text-muted">To</span>
														</div>
														<div><span class="text-dark fw-bolder">{{$payment->drop_location}}</span></div>
													</div>
												</div>
											</td>
											<td>{{$payment->booking_date}}</td>
											<td class="label-text">@money($payment->booking_price)</td>
											<td>{{$payment->name}}</td>
											
											@if (in_array($payment->id, $payment_order))
												<td><label style="background:green; color:fff;" class="btn request-btn text-uppercase">Requested</label></td>
											@else
												<td><button style="background:orange; color:fff;" type="submit" class="btn request-btn text-uppercase">Request</button></td>
											@endif
										</tr>
										</form>
									@endforeach
									
									
								</div>
                                 
                              </tbody>
                           </table>
						  
                        </div>
						<div style="text-align:center;" class="pagination_driver">
							{{	$request_payment->links("pagination::bootstrap-4") }}
						</div>
						@else								
							Sorry, No record exist
						@endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end page wrapper -->
         <!--start overlay-->
         <div class="overlay toggle-icon"></div>
         <!--end overlay-->
         <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
         <!--End Back To Top Button-->
      </div>
    
   </body>
		@include('includes.footer')
	</body>
	