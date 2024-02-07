<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('includes.head')

   
	<body>
		@include('includes.header')
		<?php //echo"<pre>"; print_r($_REQUEST); die; ?>
		<main class="main-content">
            <!--== Start Banner Area Wrapper ==-->
            <section class="inner-pages-banner">
               <img
			   	  class="banner-image"
                  src="{{ url('/img/events/banner.jpg')}}"
                  alt="home-banner"
                  />
               <div
                  class="home-slider-sidebar d-none d-xl-block"
                  data-aos="fade-zoom-in"
                  data-aos-duration="1300"
                  >
               </div>
               <div class="content text-center">
                  <div
                     class="tittle-wrp mb-4"
                     data-aos="fade-down"
                     data-aos-duration="1000"
                     >
                     <h2>Events</h2>
                  </div>
               </div>

            </section>
			@if(session()->has('error'))
				<div class="alert alert-danger">
					{{ session()->get('error') }}
				</div>
			@endif
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
            <!--== End Banner Area Wrapper ==-->
			<?php $tit=''; 
				$check_tickets = false;
			?>
			@foreach($event_data_single as $event_key => $event_val_n)
			
				<?php 
					$url = url('/images');
					$img_nm = $event_val_n->event_image;
					$tit = $event_val_n->id;
					$imgurl = $url.'/'.$img_nm; 
					$ticket_details = $event_val_n->ticket_details;
					$ticket_data = json_decode($ticket_details,true);
					$ticket_price='';
					$total_tickets='';
					
					/* echo"<pre>";
					print_r($ticket_data); */
					
					if(!empty($ticket_data)){
						foreach($ticket_data as $tic_d){
							$ticket_price = $tic_d['price'];
							$total_tickets = $tic_d['total_tickets'];
							if($total_tickets>=1){
								$check_tickets = true;
							}
						}
					}
					
				?>
				
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content orange-bg">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
						<div class="modal-body p-5">
						<?php
						if(!empty($ticket_data)){ ?>
						<form id="event_tic" method="POST" action="{{ route('payment_form') }}">
							<div class="row">
								
									<input type="hidden" name="uid" value="{{$event_val_n->user_id}}" />
									<?php
									foreach($ticket_data as $key_tick => $ticket_d){ ?>										
										@if($ticket_d['total_tickets']>=1)
											<div class="col-lg-4">
												
												@csrf
													<div class="event-price">
														<div class="charges-block ">
															<h3 class="mb-3">{{$ticket_d['ticket_name']}}</h3>
															<input type="hidden" value="{{$ticket_d['ticket_name']}}" name="ticket_name[]"/>
															<input type="hidden" value="{{$ticket_d['price']}}" name="ticket_price[]"/>
															<input type="hidden" value="{{$tit}}" name="ticket_id" />
															<input type="hidden" value="{{$ticket_d['total_tickets']}}" name="total_tickets[]" />
															
															<input type="hidden" value="{{$tit}}" name="ticket_type" />
															<h5 class="orange-text">£ {{$ticket_d['price']}}</h5>
														</div>
														<div class="event-pack-info">
															
															<div class="numbers-row mb-4">
																<input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1[]" max="{{$ticket_d['total_tickets']}}">
																<div class="inc button_inc active"> <i class="icofont-long-arrow-right"></i></div>
																<div class="dec button_inc"><i class="icofont-long-arrow-left"></i><span></div>
																<label>Maximum Quantity: {{$ticket_d['total_tickets']}}</label>
															</div>
															
														</div>
													</div>
												
											</div>
										@endif
										<?php
									}
								?>
								
							</div>
								<button type="submit" style="text-align:center;" class="checkout_btn_n btn btn btn-outline-dark mw-120 text-uppercase">Checkout</button>
							</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
						
            <section class="first-block mtb-80">
               <div class="container">
                  <div class="row align-items-center"  data-aos="fade-up"
                     data-aos-duration="1000">
                     <div class="col-lg-12 col-xl-6 mb-4">
                        <figure>
                           <img src="{{ $imgurl }}" alt="" class="rounded" />
                        </figure>
                     </div>
					 
					 
                     <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="subtitle-content">
                           <h5 class="m-0 text-uppercase">Event</h5>
                        </div>
                        <h2 class="mb-3"><strong>{{$event_val_n->event_title}}</strong></h2>
                       
                        <div class="row">
                           <div class="col-sm-12 col-md-5 mb-4">
                              <h6 class="text-uppercase orange-text">Date and time</h6>
                              <p class="m-0">{{$event_val_n->event_time}}</p>
                              
                           </div>
                           <div class="col-sm-12 col-md-3 mb-4">
                              <h6 class="text-uppercase orange-text">Location</h6>
                              <p class="m-0">{{$event_val_n->event_location}}</p>
                           </div>
                           <div class="col-sm-12 col-md-4 mb-4">
                              <h6 class="text-uppercase orange-text">Refund Policy</h6>
                              <p class="m-0">Refunds Up to 1 day before event</p>
                           </div>
                        </div>
						@if($check_tickets)
							<div class="row align-items-center">
							   <div class="col-sm-12 col-md-3 mb-3">
								  <h5 class="mb-0">
									<strong>
										<?php
											foreach($ticket_data as $key_tick => $ticket_d){ 
											if($key_tick==0) {
											?>
												<span class="getpri <?php echo $key_tick; ?>pri">£<?php echo $ticket_d['price']; ?></span>
											<?php } } ?>
									</strong></h5>
							   </div>
							   <div class="col-sm-12 col-md-3 mb-3 buy_ticket_div">
								  <a class="btn btn-outline-secondary mw-120 buy_ticket" data-bs-toggle="modal" data-bs-target="#staticBackdrop">BUY</a>
							   </div>
							</div>
						@else
							<h5 class="ticket_not available orange-text">Sorry, Ticket not available</h5>
						@endif
                     </div>
                  </div>
                  <div class="row"   data-aos="fade-up"
                     data-aos-duration="1000">
                     <div class="col-md-6">
                        <div class="info-wrap mt-4">
                           <h5>About this Event</h5>
                           <p>{{$event_val_n->about_event}}</p>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="info-wrap mt-4">
                           <h5 class="mb-3">Keynotes</h5>
                           {{$event_val_n->keynote}}
                        </div>
                        <div class="info-wrap">
                           <h5 class="mb-3">Special Guests</h5>
                           <ol>
                              <?php 
								$ary_guest = $event_val_n->guest_name;
								$json_end_guest = json_decode($ary_guest);
								
								foreach($json_end_guest as $guest){
									echo "<li>".$guest."</li>";
								}
							  ?>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
			@endforeach
          
         </main>
         <!--== Start Footer Area Wrapper ==-->
		
		@include('includes.footer')
	 </body>
</html>
		
		