   <div class="container custom-container">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="feature-event-slider-content" data-aos="fade-up" data-aos-duration="1300">
                           <div class="swiper-container feature-event-slider-container">
                              <div class="swiper-wrapper feature-event-slider">
							  
								@foreach($event_data as $event_key => $event_val)
									<?php
										$input = $event_val->event_time;
										$date = strtotime($input);
										$date_vl = date('D, dM, Y h:i:s', $date);
										$ticket_details = $event_val->ticket_details;
										$url = url('/images');
										$img_nm = $event_val->event_image;
										$imgurl = $url.'/'.$img_nm;
										//echo $ticket_details;
										$ticket_data = json_decode($ticket_details,true);
										/* echo"<pre>";
										print_r($ticket_data);
										echo"</pre>"; */
										$ticket_price='';
										$total_tickets='';
										 if(!empty($ticket_data)){
											$ticket_price = $ticket_data[0]['price'];
											$total_tickets = $ticket_data[0]['total_tickets'];
										}
									?>
									<div class="swiper-slide feature-event-item">
										<div class="inner-content">
										   <div class="thumb">
											  <a href="event/{{$event_val->id}}"> <img src="{{ $imgurl }}"></a>
										   </div>
										   <div class="feature-event-info">
											  <div class="content">
												 <span class="amt-price">£ 14.99</span>
												 <h3 class="title"><a href="events.html">{{$event_val->event_title}}</a></h3>
												 <a href="event/{{$event_val->id}}" class="category">{{$event_val->keynote}}</a>
											  </div>
											  <a href="event/{{$event_val->id}}" class="date-time">{{$date_vl}}</a>
										   </div>
										</div>
									</div>
								@endforeach
                                 
                                 <!--<div class="swiper-slide feature-event-item">
                                    <div class="inner-content">
                                       <div class="thumb">
                                          <a href="events.html"> <img src="{{ url('/img/home-photos/event-img01.jpg')}}"></a>
                                       </div>
                                       <div class="feature-event-info">
                                          <div class="content">
                                             <span class="amt-price">£ 14.99</span>
                                             <h3 class="title"><a href="events.html">Music event live</a></h3>
                                             <a href="events.html" class="category">Music event poster template with...</a>
                                          </div>
                                          <a href="events.html" class="date-time">Fri, Apr 30, 2021 5:00 AM IST</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide feature-event-item">
                                    <div class="inner-content">
                                       <div class="thumb bg-img-center-left">
                                          <a href="events.html"> <img src="{{ url('/img/home-photos/event-img02.jpg')}}"></a>
                                       </div>
                                       <div class="feature-event-info">
                                          <div class="content">
                                             <span class="amt-price">£ 14.99</span>
                                             <h3 class="title"><a href="events.html">Music event live</a></h3>
                                             <a href="events.html" class="category">Music event poster template with...</a>
                                          </div>
                                          <a href="events.html" class="date-time">Fri, Apr 30, 2021 5:00 AM IST</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="swiper-slide feature-event-item">
                                    <div class="inner-content">
                                       <div class="thumb bg-img-center-left">
                                          <a href="events.html"> <img src="{{ url('/img/home-photos/event-img03.jpg')}}"></a>
                                       </div>
                                       <div class="feature-event-info">
                                          <div class="content">
                                             <span class="amt-price">£ 14.99</span>
                                             <h3 class="title"><a href="events.html">Music event live</a></h3>
                                             <a href="events.html" class="category">Music event poster template with...</a>
                                          </div>
                                          <a href="events.html" class="date-time">Fri, Apr 30, 2021 5:00 AM IST</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>-->
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
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>