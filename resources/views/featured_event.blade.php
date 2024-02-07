<section class="feature-event-area">
   <div class="container  pb-50">
	  <div class="row align-items-center" data-aos="fade-up" data-aos-duration="1000">
		 <div class="col-sm-12">
			<div class="section-title text-center mb-5">
			   <div class="subtitle-content xs-d-i-flex">
				  <h5 class="text-uppercase">IT’S A BIG WORLD OUT THERE</h5>
			   </div>
			   <h2 class="title">Featured Events</h2>
			</div>
		 </div>
	  </div>
   </div>
   <div class="container custom-container">
	  <div class="row">
		 <div class="col-lg-12">
		 
			<div class="feature-event-slider-content" data-aos="fade-up" data-aos-duration="1300">
			   <div class="swiper-container feature-event-slider-container">
				@if(!$event_data->isEmpty())
					<div class="swiper-wrapper feature-event-slider">
						@foreach($event_data as $event_key => $event_val)
						
							@php
								$ticket_details = $event_val->ticket_details;
								$url = url('/images');
								$img_nm = $event_val->event_image;
								$imgurl = $url.'/'.$img_nm;
								$ticket_price='';
								$total_tickets='';
								if(!empty($ticket_data)){
									$ticket_price = $ticket_data[0]['price'];
									$ticket_price = (float) $ticket_price;
									$total_tickets = $ticket_data[0]['total_tickets'];
								}
								
								$input = $event_val->event_time;
								$date = strtotime($input);
								$date_vl = date('D, dM, Y h:i:s', $date);
							@endphp
							
							<div class="swiper-slide feature-event-item">
								<div class="inner-content"> 
								   <div class="thumb">
									  <a href="event/{{$event_val->id}}"> <img src="{{$imgurl}}"></a>
								   </div>
								   <div class="feature-event-info">
									  <div class="content">
										 <span class="amt-price">{{$ticket_price}}</span>
										 <h3 class="title"><a href="events.html">{{$event_val->event_title}}</a></h3>
										 <a href="events.html" class="category">{{$event_val->keynote}}</a>
									  </div>
									  
									  <a href="events.html" class="date-time">{{$date_vl}}</a>
								   </div>  
								</div>
							</div>
						@endforeach
						
					</div>
				
					<div class="row mt-5">
						<div class="col-6">
							<!-- Next Previous Button Start -->
							<div class="feature-event-list-next swiper-button-next"><i class="icofont-long-arrow-right"></i></div>
							<div class="feature-event-list-prev swiper-button-prev"><i class="icofont-long-arrow-left"></i></div>
							<!-- Next Previous Button End -->
						</div>
						<div class="col-6">
							<a href="#" class="btn btn-link float-end">VIEW MORE</a>
						</div>
					</div>
				@else
					<div>Sorry, No events available</div>
				
				@endif
				  
			   </div>
			</div>
		 </div>
	  </div>
   </div>
</section>