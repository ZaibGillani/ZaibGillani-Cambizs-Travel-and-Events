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
               <div class="layer-style d-none d-xl-block">
                  <div class="shape-style1"></div>
                  <div class="shape-style2"></div>
                  <div class="shape-style3"></div>
                  <div class="shape-style4"></div>
                  <div class="line-style1"></div>
                  <div class="line-style2"></div>
                  <div class="line-style3"></div>
                  <div class="line-style4"></div>
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
										<div class="panel-heading display-table" >
											<div class="row display-tr" >
												<h3 class="panel-title display-td" >Payment Details</h3>
												<div class="display-td" >                            
													<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
												</div>
											</div>
										</div>
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
													<input type="hidden" value="" class="ticket_price" />
													<input type="hidden" value="" class="select_ticket_type" />
													<input type="hidden" value="" class="ticket_id" />
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
                           <div class="col-sm-12 col-md-4 mb-4">
                              <div class="nice-select wide" tabindex="0">
							  <span class="current">Select ticket type</span>
							  <ul class="list">
								<?php
									foreach($ticket_data as $key_tick => $ticket_d){ ?>										
										<li data-value="<?php echo $key_tick; ?>" class="option select_ticket_name"><?php echo $ticket_d['ticket_name']; ?></li>
										<?php 
									}
								?>
								</ul></div>
                           </div>
						   <div class="col-sm-12 col-md-3 mb-3">
                              <h5 class="mb-0">
								<strong>
									<?php
										foreach($ticket_data as $key_tick => $ticket_d){ ?>
											<span style='display:none;' class="getpri <?php echo $key_tick; ?>pri">£<?php echo $ticket_d['price']; ?></span>
									<?php } ?>
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
            <!--== Start Travel& Event Area Wrapper ==-->
            <section
               class="second-block mtb-80"
               data-aos="fade-up"
               data-aos-duration="1000"
               >
               <div class="container">
                  <div class="mb-5 text-center">
                     <div class="subtitle-content">
                        <h5 class="text-uppercase">Its a big world out there</h5>
                     </div>
                     <h2 class="mb-3"><strong>Browse all Travel and Events</strong></h2>
                  </div>
                  <ul class="nav nav-pills events-list justify-content-center parent-tab" id="pills-tab" role="tablist">
                     <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Travel</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Events</button>
                     </li>
                  </ul>
                  <div class="tab-content p-4" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <ul class="nav nav-pills mb-3 child-tab justify-content-center align-items-center" id="pills-tab" role="tablist">
                           <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-flight-tab" data-bs-toggle="pill" data-bs-target="#pills-flight" type="button" role="tab" aria-controls="pills-flight" aria-selected="true"><img src="{{ url('/img/icons/flight.png')}}" alt=""><span>Flight</span></button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-bus-tab" data-bs-toggle="pill" data-bs-target="#pills-bus" type="button" role="tab" aria-controls="pills-bus" aria-selected="false"><img src="{{ url('/img/icons/bus.png')}}" alt=""><span>Bus</span></button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-cruise" type="button" role="tab" aria-controls="pills-cruise" aria-selected="false"><img src="{{ url('/img/icons/cruise.png')}}" alt=""><span>Cruise</span></button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-train" type="button" role="tab" aria-controls="pills-train" aria-selected="false"><img src="{{ url('/img/icons/train.png')}}" alt=""><span>Train</span></button>
                           </li>
                        </ul>
                        <div class="tab-content child-pane" id="pills-tabContent">
                           <div class="tab-pane fade show active p-4" id="pills-flight" role="tabpanel" aria-labelledby="pills-flight-tab">
                              <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
                                 </li>
                              </ul>
                              <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
                                 <form>
                                    <div class="row custom-input-style">
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">From</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2 pr-0">
                                          <label class="pl-10">To</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="Canada (CA)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2">
                                          <label class="pl-10">Depart</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-calendar"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3 pl-0">
                                          <label class="pl-10">Cabin Class & Travells</label>
                                          <div class="custom-select-form">
                                             <select class="wide">
                                                <option value="" selected>1 Adult, Economy</option>
                                                <option value="">2 Adult, Economy</option>
                                                <option value=" ">3 Adult, Economy</option>
                                                <option value=" ">4 Adult, Economy</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
                                    </div>
                                    <div class="mt-5 justify-content-center check-block">
                                       <label class="check-custom-style">Add nearby airports
                                       <input type="checkbox">
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="check-custom-style">Direct flights only
                                       <input type="checkbox">
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="check-custom-style">Flexible tickets only
                                       <input type="checkbox">
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="check-custom-style">Add nearby airports
                                       <input type="checkbox" checked="checked">
                                       <span class="checkmark"></span>
                                       </label>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane fade p-4" id="pills-bus" role="tabpanel" aria-labelledby="pills-bus-tab">
                              <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
                                 </li>
                              </ul>
                              <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
                                 <form>
                                    <div class="row custom-input-style">
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">From</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">To</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2">
                                          <label class="pl-10">Depart</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-calendar"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2 pl-0">
                                          <label class="pl-10">Pessenger</label>
                                          <div class="custom-select-form">
                                             <select class="wide">
                                                <option value="" selected>1</option>
                                                <option value="">2</option>
                                                <option value=" ">3</option>
                                                <option value=" ">4</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane fade p-4" id="pills-cruise" role="tabpanel" aria-labelledby="pills-cruise-tab">
                              <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
                                 </li>
                              </ul>
                              <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
                                 <form>
                                    <div class="row custom-input-style">
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">From</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-4 pr-0">
                                          <label class="pl-10">To</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <label class="pl-10">Depart</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-calendar"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane fade p-4" id="pills-train" role="tabpanel" aria-labelledby="pills-train-tab">
                              <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
                                 </li>
                              </ul>
                              <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
                                 <form>
                                    <div class="row custom-input-style">
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">From</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-4 pr-0">
                                          <label class="pl-10">To</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <label class="pl-10">Depart</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-calendar"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @include('home_event')
                     </div>
                  </div>
               </div>
            </section>
            <!--== End Travel& Event Area Wrapper ==-->
         </main>
         <!--== Start Footer Area Wrapper ==-->
		
		@include('includes.footer')
	 </body>
</html>
		
		