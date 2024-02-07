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
            <div class="page-content">
               <div class="d-flex align-items-center mb-4 pb-2">
                  <div>
                     <h3 class="mb-0"> <i class='bx bx-credit-card-alt text-orange'></i> Payout Request</h3>
                  </div>
               </div>
               <div class="payout-info-block">
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
                                    <th>Ride Id</th>
                                    <th>Driver Id</th>
                                    <th>Amout</th>
                                    <th>(Deduction-5%)</th>
                                    <th>Send to driver</th>
                                    <th>Status</th>
                                 </tr>
                              </thead>
                              <tbody>
								@foreach($request_payment as $key => $payment)
									<form action="{{ route('submit_payment_driver') }}" method="post" class="row g-3">
									@csrf
									<input type="hidden" name="ride_id" value="{{$payment->ride_id}}" />
									<input type="hidden" name="order_id" value="{{$payment->order_id}}" />
									<input type="hidden" name="payment_id" value="{{$payment->id}}" />
									<tr>
										<td>
										<a href="/view_ride/{{$payment->ride_id}}" target="_blank">{{$payment->ride_id}}</a>
										</td>	
										<td>
										{{$payment->driver_id}}
										</td>
										<td class="label-text">{{$payment->booking_price}}</td>
										<?php
											$percentage = 5;
											$totalWidth = $payment->booking_price;
											$val = ($percentage / 100) * $totalWidth;
											$final_amount = $payment->booking_price-$val;
										?>
										<td>{{$val}}</td>
										<td>
										
										{{$final_amount}}
										</td>
										
										<td>
											{{$payment->status}}
											@if($payment->status=='waiting')
												<br/><button class="btn request-btn text-uppercase" type="submit">Submit Payment</button
											@endif
										</td>
									</tr>
								@endforeach
                                </form>
                                
                              </tbody>
                           </table>
                        </div>
						@else
							No, Payout request found
						@endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end page wrapper -->
		</div>
		@include('includes.footer')
	</body>
	