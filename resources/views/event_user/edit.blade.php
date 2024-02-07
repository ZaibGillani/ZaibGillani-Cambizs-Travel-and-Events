<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('event_user.include.head')
	<link href="{{ url('/css/custom_css.css') }}" rel="stylesheet"/>
   
	<body>
		
			<!--sidebar wrapper -->
			<div class="wrapper custom_css">
			<div class="col-md-3">
				@include('event_user.include.sidebar')
			</div>
         <!--end sidebar wrapper -->
			<main class="main-content col-md-9">
            <!--== Start Banner Area Wrapper ==-->
            <section class="inner-pages-banner">
            
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
            <section class="create-event-first-block mtb-80" data-aos="fade-up"
               data-aos-duration="1000">
				@if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif
               <div class="container">
				<form action="edit" method="post" enctype="multipart/form-data">
				@csrf
				
				<input type="hidden" name="event_category" class="event_category" value="re-union" />
			
                  <div class="event-create-step">
                     <ul class="nav nav-tabs step-tab justify-content-center mb-5" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                           <button class="nav-link active" id="stepone-tab" data-bs-toggle="tab" data-bs-target="#stepone" type="button" role="tab" aria-controls="stepone" aria-selected="true"><strong class="orange-text">Step 1 </strong> General Information </button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button class="nav-link" id="steptwo-tab" data-bs-toggle="tab" data-bs-target="#steptwo" type="button" role="tab" aria-controls="steptwo" aria-selected="false"><strong class="orange-text">Step 2</strong> Pricing & Location</button>
                        </li>
                     </ul>
					 <?php   /*  echo"<pre>";
					 print_r($event_data); */
					// die;
					  ?>
					 @php
						$cat_nm = '';
					 @endphp
					 @foreach($event_data as $event_key => $event_val_n)
						<?php $cat_nm = $event_val_n->category_name; 
							$event_time = $event_val_n->event_time;
							$ticket_details = $event_val_n->ticket_details;
							$date_selected = date("Y-m-d", strtotime($event_time));
							$time_selected = date("h:i:s",strtotime($event_time));
							$jsn = json_decode($ticket_details);
							/* echo"<pre>";
					 print_r($jsn);
					 die;  */
							
							
						?>
						<input type="hidden" name="event_id" value="{{$event_val_n->id}}" />
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stepone" role="tabpanel" aria-labelledby="stepone-tab">
                           <div class="tab-content" id="myTabContents">
                              <ul class="nav nav-tabs create-events-tab justify-content-center pb-2 mb-5" id="myTab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link cat_slct" id="social-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                    <img src="{{ url('/img/events/social.jpg')}}" alt="#">
                                    <span>SOCIAL</span>
                                    </button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link cat_slct" id="corporate-tab" data-bs-toggle="tab" data-bs-target="#corporate" type="button" role="tab" aria-controls="profile" aria-selected="false"><img src="{{ url('/img/events/corporate.jpg')}}" alt="#">
                                    <span>CORPORATE</span></button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link cat_slct" id="sports-tab" data-bs-toggle="tab" data-bs-target="#sports" type="button" role="tab" aria-controls="contact" aria-selected="false">     <img src="{{ url('/img/events/sports.jpg')}}" alt="#">
                                    <span>SPORTS</span></button>
                                 </li>
                              </ul>
							  
                              <div class="tab-content category_slct" id="myTabContent">
                                 <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="border rounded events-list p-3 mb-4">
                                       <h4 class="block-title text-center mb-5"><span class="orange-text">1 </span>What is the catogery of your event?</h4>
                                       <div class="row justify-content-center event_cat_slct">
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" class="active" attr="re-union"><img src="assets/img/events/icon1.png" alt=""> <img src="{{ url('/img/events/icon01.png')}}" alt=""> </a><span>re-union</span>
                                          </div>
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" attr="parties & celebrations"> <img src="{{ url('/img/events/icon2.png')}}" alt=""> <img src="{{ url('/img/events/icon2.png')}}" alt=""></a><span>parties & celebrations</span>
                                          </div>
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" attr="Galas"> <img src="assets/img/events/icon3.png" alt=""> <img src="{{ url('/img/events/icon03.png')}}" alt=""></a><span>Galas</span>
                                          </div>
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" attr="clubbing"><img src="{{ url('/img/events/icon4.png')}}" alt=""> <img src="{{ url('/img/events/icon04.png')}}" alt=""></a> <span>clubbing</span>
                                          </div>
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" attr="leisure"><img src="{{ url('/img/events/icon05.png')}}" alt=""> <img src="{{ url('/img/events/icon05.png')}}" alt=""></a><span>leisure</span>
                                          </div>
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" attr="culture
                                             (music, theatre etc)"><img src="{{ url('/img/events/icon06.png')}}" alt=""> <img src="{{ url('/img/events/icon06.png')}}" alt=""></a><span>culture(music, theatre etc)</span>
                                          </div>
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" attr="religious"><img src="{{ url('/img/events/icon7.png')}}" alt=""> <img src="{{ url('/img/events/icon07.png')}}" alt=""></a><span>religious</span>
                                          </div>
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" attr="other live events"><img src="{{ url('/img/events/icon8.png')}}" alt=""> <img src="{{ url('/img/events/icon08.png')}}" alt=""></a><span>other live events</span>
                                          </div>
                                       </div>
                                    </div>
                                    
                                 </div>
                                 <div class="tab-pane fade" id="corporate" role="tabpanel" aria-labelledby="corporate-tab">
                                    <div class="border rounded events-list p-3 mb-4">
                                       <h4 class="block-title text-center mb-5"><span class="orange-text">1 </span>What is the catogery of your event?</h4>
                                       <div class="row justify-content-center event_cat_slct">
                                          <div class="col-auto">
                                             <a href="javascript:void(0);" attr="seminars &
                                             conferences" class="active"><img src="{{ url('/img/events/icon9.png')}}assets/img/events/icon9.png" alt=""> <img src="{{ url('/img/events/icon09.png')}}" alt=""> </a><span>seminars &
                                             conferences</span>
                                          </div>
                                          <div class="col-auto">
                                             <a attr="exhibitions" href="javascript:void(0);"> <img src="{{ url('/img/events/icon10.png')}}" alt=""> <img src="{{ url('/img/events/icon010.png')}}" alt=""></a><span>exhibitions</span>
                                          </div>
                                          <div class="col-auto">
                                             <a attr="workshops" href="javascript:void(0);"> <img src="{{ url('/img/events/icon11.png')}}" alt=""> <img src="{{ url('/img/events/icon011.png')}}" alt=""></a><span>workshops</span>
                                          </div>
                                       </div>
                                    </div>
                                   
                                   
                                 </div>
                                 <div class="tab-pane fade" id="sports" role="tabpanel" aria-labelledby="sports-tab">
                                    <div class="border rounded events-list p-3 mb-4">
                                       <h4 class="block-title text-center mb-5"><span class="orange-text">1 </span>What is the catogery of your event?</h4>
                                       <div class="row justify-content-center event_cat_slct">
                                          <div class="col-auto">
                                             <a attr="all sporting events" href="javascript:void(0);" class="active"><img src="{{ url('/img/events/icon012.png')}}" alt=""> <img src="{{ url('/img/events/icon12.png')}}" alt=""></a><span>all sporting events</span>
                                          </div>
                                       </div>
                                    </div>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
						
						<div class="event_sction">
							<div class="row">
                                       <div class="col-md-6  mb-4">
                                          <div class="border rounded p-4">
                                             <h4 class="block-title text-center"><span class="orange-text">2 </span>Is this a private or public event?</h4>
                                             <div class="public-private-block mt-5 d-flex justify-content-center">
                                                <div>
                                                   <input type="text" id="ans02" hidden/>
												   	@if($event_val_n->event_type=="Public")
														@php $set_status = "active"; @endphp
														<input type="button" id="y02" class="evnt_tp btn active" value="Public" />
														<input type="button" id="n02" class="btn evnt_tp" value="Private" />
													@else	
														<input type="button" id="y02" class="evnt_tp btn" value="Public" />
														<input type="button" id="n02" class="btn evnt_tp active" value="Private" />
													@endif
                                                   
                                                   
												   <input type="hidden" name="event_type" class="event_type" value="{{$event_val_n->event_type}}" />
                                                    <div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6  mb-4">
                                          <div class="border rounded p-4 custom-input-block">
                                             <h4 class="block-title text-center mb-5"><span class="orange-text">3 </span>When will this event be?</h4>
                                             <div class="justify-content-center step-block-3">
                                                <div class="form-group mr-10">
                                                   <label class="pl-10">Date</label>
                                                   <div class="input-group input-group-merge">
                                                      <input name="event_date" type="date" value="<?php echo $date_selected ; ?>" placeholder="Date" class="form-control form-control-prepended event_dt"/>
                                                      
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="pl-10">Time</label>
                                                   <div class="input-group input-group-merge">
                                                      <input name="event_time" type="time" value="{{$time_selected}}" placeholder="Time" class="form-control form-control-prepended event_tm"/>
                                                      
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-md-6  mb-4">
                                          <div class="rounded border p-4 custom-input-block">
                                             <h4 class="block-title text-center mb-5"><span class="orange-text">4 </span>Event Title</h4>
                                             <div class="form-group mb-4 m-auto w-380">
                                                <label class="pl-10">Add Title</label>
                                                <input type="text" placeholder="Event Title" value="{{$event_val_n->event_title}}" name="event_title" class="event_title form-control"/>
                                             </div>
                                             <div class="form-group m-auto w-380">
                                                <label class="pl-10">Keynotes</label>
                                                <textarea name="keynotesnt_title" type="text" rows="4" placeholder="Keynotesnt Title" class="form-control keynotesnt_title">{{ $event_val_n->keynote }}</textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6  mb-4">
                                          <div class="rounded border p-4 custom-input-block">
                                             <h4 class="block-title text-center mb-5"><span class="orange-text">5 </span>Event About</h4>
                                             <div class="form-group mb-4 m-auto w-380">
                                                <label class="pl-10">About</label>
                                                <input type="text" name="about_event" value="{{$event_val_n->about_event}}" class="about_event form-control"/>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row mb-5">
                                       <div class="col-md-12">
                                          <div class="border rounded p-4">
                                             <h4 class="block-title text-center mb-5"><span class="orange-text">6 </span> Event’s Picture</h4>
                                             
                                                <img src="{{ url('/img/events/upload-icon.png')}}" alt=""/>
                                                <span class="orange-text">Drag & drop to upload</span>
                                                <input type="file" id="myFile" name="filename2">
												<a href="{{url('/images')}}/{{$event_val_n->event_image}}"><img width="250" src="{{url('/images')}}/{{$event_val_n->event_image}}"></a>
												
                                          </div>
                                       </div>
                                    </div>
									<div class="text-center"><button type="button" class="next_btn btn btn-dark text-uppercase w-120">Next</button></div>
						</div>
						
                        <div class="tab-pane fade" id="steptwo" role="tabpanel" aria-labelledby="steptwo-tab">
                           <div class="row">
                              <div class="col-md-6 mb-4">
                                 <div class="rounded border p-4 custom-input-block">
                                    <h4 class="block-title text-center mb-5"><span class="orange-text">7 </span> What is your location?</h4>
                                    <div class="form-group mb-4 m-auto w-380">
                                       <label class="pl-10">Address</label>
                                       <input name="address" type="text" value="{{$event_val_n->event_location}}" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                 <div class="rounded border p-4 custom-input-block">
                                    <h4 class="block-title text-center mb-5"><span class="orange-text">8 </span>Any special guests?</h4>
                                    <div class="form-group mb-4 m-auto w-380">
                                       <label class="pl-10">Name</label>
                                      
									   @foreach (json_decode($event_val_n->guest_name) as $guest)
											 <input placeholder="Guest Name" value="{{$guest}}" name="special_guest[]" type="text" class="1-inc form-control">
										@endforeach
										
										<div class="add_more_content">
										
										</div>
										
                                       <div class="text-right mt-2"> <a href="javascript:void(0);" class="orange-text add_more">Add More</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12 mb-5">
                                 <div class="rounded border p-4 custom-input-block">
                                    <h4 class="block-title text-center mb-5"><span class="orange-text">9 </span> Ticket Pricing</h4>
                                    <div class="row justify-content-center">
                                       <div class="col-sm-12 col-md-10 col-lg-8">
                                          <div class="row">
                                             <div class="col-md-4 ticket-block">
                                                <div class="form-group">
                                                   <label class="pl-10">Ticket Name</label>
												   @foreach (json_decode($event_val_n->ticket_details) as $ticket_details)
														<input name="ticket_name[]" type="text" class="form-control mb-3" value="{{$ticket_details->ticket_name}}"/>	
												   @endforeach
                                                  
                                                </div>
                                             </div>
                                             <div class="col-md-4 ticket-block">
                                                <div class="form-group">
                                                   <label class="pl-10">Price</label>
													@foreach (json_decode($event_val_n->ticket_details) as $ticket_details)														
														<input name="price[]" type="text" class="form-control mb-3" value="{{$ticket_details->price}}"/>
													@endforeach
                                                   
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label class="pl-10">Number of Ticket</label>
													@foreach (json_decode($event_val_n->ticket_details) as $ticket_details)												
														<input type="text" name="no_of_tickets[]" class="form-control mb-3" value="{{$ticket_details->total_tickets}}"/>
													@endforeach
												</div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="text-center">
                              <button type="button" class="btn btn-outline-warning text-uppercase back-btn">Back</button>
                              <button type="submit" class="btn btn-dark text-uppercase">Update Event  <i class="icofont-plus"></i></button>
                           </div>
                        </div>
                     </div>
					 @endforeach
                  </div>
				  </form>
               </div>
            </section>
            <!--== End Travel& Event Area Wrapper ==-->
         </main>
		 </div>
			<script>
				$(document).ready(function(){
				  //$("p").click(function(){
					var get_cat = '<?php echo $cat_nm ?>';
					$("#myTabContents a").each(function (){
						var get_atr = $(this).attr('attr');
						if(get_cat==get_atr){
							$(this).addClass('active');
							$(this).closest('.cat_slct').addClass('active');
							var get_id = $(this).closest('.tab-pane').attr('id');
							var get_vl = $(this).closest('.tab-pane').attr('id');
							
							if(get_id=="home"){
								get_id = "social";
							}
							$("#"+get_vl).addClass('active show');
							$("#"+get_id+"-tab").addClass('active');
						} else{
							$(this).removeClass('active');
							//$(this).closest('.cat_slct').removeClass('active');
						}
					});
					$(this).hide();
				  //});
				});
			</script>
			@include('includes.footer')
   </body>
</html>