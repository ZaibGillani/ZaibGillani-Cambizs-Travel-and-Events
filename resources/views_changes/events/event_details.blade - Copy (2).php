<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('includes.head')

   
	<body>
		@include('includes.header')
		
			         <main class="main-content">
            <!--== Start Banner Area Wrapper ==-->
            <section class="inner-pages-banner">
               <img
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
            <!--== End Banner Area Wrapper ==-->
			<?php $tit=''; ?>
			@foreach($event_data_single as $event_key => $event_val_n)
			
				<?php $url = url('/images');
					$img_nm = $event_val_n->event_image;
					$tit = $event_val_n->id;
					$imgurl = $url.'/'.$img_nm; 
					$ticket_details = $event_val_n->ticket_details;
					$ticket_data = json_decode($ticket_details,true);
					$ticket_price='';
					$total_tickets='';
					
					 if(!empty($ticket_data)){
						$ticket_price = $ticket_data[0]['price'];
						$total_tickets = $ticket_data[0]['total_tickets'];
					}
					foreach($ticket_data as $ticket_d){
						//echo $ticket_d['price'];
					}
					//echo $total_tickets;
				?>
				
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content orange-bg">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
						<div class="modal-body p-5">
							
							
							<div class="container">
								
								<div class="row">
									<div class="col-md-6 col-md-offset-3">
										<div class="panel panel-default credit-card-box">
										<div class="panel-body">
										@if (Session::has('success'))
										<div class="alert alert-success text-center">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
											<p>{{ Session::get('success') }}</p>
										</div>
											@endif
											<form
											role="form"
											action="{{ route('payment_process') }}"
											method="post"
											class="require-validation"
											data-cc-on-file="false"
											data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
											id="payment-form">
											@csrf
												<div class='form-row row'>
													<input name="ticket_price" type="hidden" value="" class="ticket_price" />
													<input name="ticket_type" type="hidden" value="" class="select_ticket_type" />
													<input name="ticket_id" type="hidden" value="<?php echo $tit; ?>" class="ticket_id" />
													<div class='col-xs-12 form-group required'>
													  <label class='control-label'>Name on Card</label> <input
														 class='form-control' size='4' type='text'>
													</div>
												</div>
												<div class='form-row row'>
													<div class='col-xs-12 form-group card required'>
													  <label class='control-label'>Card Number</label> <input
														 autocomplete='off' class='form-control card-number' size='20'
														 type='text'>
													</div>
												</div>
												<div class='form-row row'>
													<div class='col-xs-12 col-md-4 form-group cvc required'>
													  <label class='control-label'>CVC</label> <input autocomplete='off'
														 class='form-control card-cvc' placeholder='ex. 311' size='4'
														 type='text'>
													</div>
													<div class='col-xs-12 col-md-4 form-group expiration required'>
													  <label class='control-label'>Expiration Month</label> <input
														 class='form-control card-expiry-month' placeholder='MM' size='2'
														 type='text'>
													</div>
													<div class='col-xs-12 col-md-4 form-group expiration required'>
													  <label class='control-label'>Expiration Year</label> <input
														 class='form-control card-expiry-year' placeholder='YYYY' size='4'
														 type='text'>
													</div>
												</div>
												<div class='form-row row'>
													<div class='col-md-12 error form-group hide'>
													  <div class='alert-danger alert'>Please correct the errors and try
														 again.
													  </div>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-12">
													  <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
													</div>
												</div>
											</form>
										</div>
									</div>
									</div>
								</div>
							</div>
							
							<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
							<script type="text/javascript">
							$(function() {
							var $form = $(".require-validation");
							$('#payment-form').bind('submit', function(e) {
								console.log("2342324");
								var $form = $(".require-validation"),
								inputSelector = ['input[type=email]', 'input[type=password]',
								'input[type=text]', 'input[type=file]',
								'textarea'
								].join(', '),
								$inputs = $form.find('.required').find(inputSelector),
								$errorMessage = $form.find('div.error'),
								valid = true;
								$errorMessage.addClass('hide');
								$('.has-error').removeClass('has-error');
								$inputs.each(function(i, el) {
								var $input = $(el);
								if ($input.val() === '') {
									$input.parent().addClass('has-error');
									$errorMessage.removeClass('hide');
									e.preventDefault();
								}
								});
								if (!$form.data('cc-on-file')) {
									e.preventDefault();
									Stripe.setPublishableKey($form.data('stripe-publishable-key'));
									Stripe.createToken({
									number: $('.card-number').val(),
									cvc: $('.card-cvc').val(),
									exp_month: $('.card-expiry-month').val(),
									exp_year: $('.card-expiry-year').val()
									}, stripeResponseHandler);
								}
							});
							function stripeResponseHandler(status, response) {
								if (response.error) {
									$('.error')
									.removeClass('hide')
									.find('.alert')
									.text(response.error.message);
								} else {
								/* token contains id, last4, and card type */
									var token = response['id'];
									$form.find('input[type=text]').empty();
									$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
									$form.get(0).submit();
								}
							}
							});
							</script>
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
                           <div class="col-sm-12 col-md-3 mb-3">
								<input type="hidden" value="{{$tit}}" class="ticket_id" />
                              <a class="btn btn-outline-secondary mw-120 buy_ticket" data-bs-toggle="modal" data-bs-target="#staticBackdrop">BUY</a>
							  
                           </div>
                           
                        </div>
						
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
		
		