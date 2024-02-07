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
                        <div class="table-responsive">
						@if(session()->has('message'))
							<div class="alert alert-success">
								{{ session()->get('message') }}
							</div>
						@endif
						@if(!$request_payment->isEmpty()) 
							
                           <table class="table align-middle mb-0 table-striped-custom">
                              <thead>
                                 <tr>
                                    <th>Event Name</th>
                                    <th>Order Id</th>
                                    <th>Order Amount</th>
                                    <th>(Deduction-5%)</th>
                                    <th>Status</th>
                                 </tr>
                              </thead>
                              <tbody>
								@foreach($request_payment as $key => $payment)
								<form action="{{ route('submit_payment_artist') }}" method="post" class="row g-3">
									@csrf
									<input type="hidden" name="event_id" value="{{$payment->event_id}}" />
									<input type="hidden" name="order_event_id" value="{{$payment->order_event_id}}" />
									<input type="hidden" name="payment_id" value="{{$payment->id}}" />
                                 <tr>
                                    <td>
                                       <div class="d-flex align-items-center">
                                          <div class="ms-2">
                                             <h6 class="mb-0">{{$payment->event_name}}</h6>
                                          </div>
                                       </div>
                                    </td>
                                    <td>{{$payment->order_event_id}}</td>
                                    <td class="label-text">@money($payment->ticket_total_price)</td>
									<?php
										$percentage = 5;
										$totalWidth = $payment->ticket_total_price;
										$val = ($percentage / 100) * $totalWidth;
										$final_amount = $payment->ticket_total_price-$val;
									?>
                                    <td>@money($final_amount)</td>
									<td>
										
										@if($payment->status=='waiting')
											<br/>
										<button class="btn request-btn text-uppercase" type="submit">Submit Payment</button>
										@endif
										@if($payment->status=='complete')
											<br/>
											<span>Completed</span>
										@endif
									</td>
                                    <!--<td>
                                       <select class="custom-select text-success">
                                          <option>Confirmed</option>
                                          <option>Declined</option>
                                          <option>Select</option>
                                       </select>
                                    </td>-->
                                 </tr>
								 </form>
                                @endforeach
                              </tbody>
                           </table>
							@else
								No, Payout request found for artist.
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
	