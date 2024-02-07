<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('includes.head')

   
	<body>
		@include('includes.header')
			
			<main class="main-content">
            <!--== Start Banner Area Wrapper ==-->
            <section class="inner-pages-banner">
               <img
                  class="banner-image"
                  src="{{ url('/img/events/banner_1.jpg')}}"
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
                     <h2>Create Events</h2>
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
               <div class="container">
				<form id="event_frm" action="add" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="event_category" class="event_category" value="re-union" />
				<input type="hidden" name="event_title" class="event_title_hidden" value="" />
				<input type="hidden" name="event_date" class="event_date_hidden" value="" />
				<input type="hidden" name="event_time" class="event_time_hidden" value="" />
                  <div class="event-create-step">
                     <ul class="nav nav-tabs step-tab justify-content-center mb-5" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                           <button class="nav-link active" id="stepone-tab" data-bs-toggle="tab" data-bs-target="#stepone" type="button" role="tab" aria-controls="stepone" aria-selected="true"><strong class="orange-text">Step 1 </strong> General Information </button>
                        </li>
                        <li class="nav-item" role="presentation">
                           <button class="nav-link" id="steptwo-tab" data-bs-toggle="tab" data-bs-target="#steptwo" type="button" role="tab" aria-controls="steptwo" aria-selected="false"><strong class="orange-text">Step 2</strong> Pricing & Location</button>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stepone" role="tabpanel" aria-labelledby="stepone-tab">
                           <div class="tab-content" id="myTabContents">
                              <ul class="nav nav-tabs create-events-tab justify-content-center pb-2 mb-5" id="myTab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active cat_slct" id="social-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
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
							  
                              <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                                   <input type="button" id="y02" class="evnt_tp btn active" value="Public" />
                                                   <input type="button" id="n02" class="btn evnt_tp" value="Private" />
												   <input type="hidden" name="event_type" class="event_type" value="Public" />
                                                    <div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6  mb-4">
                                          <div class="border rounded p-4 custom-input-block">
                                             <h4 class="block-title text-center mb-5"><span class="orange-text">3 </span>When will this event be?</h4>
                                             <div class="d-flex justify-content-center step-block-3">
                                                <div class="form-group mr-10">
                                                   <label class="pl-10">Date</label>
                                                   <div class="input-group input-group-merge">
                                                      <input name="" id="dateID" type="date" value="" placeholder="Date" class="form-control form-control-prepended event_dt"/>
                                                      
                                                   </div>
                                                </div>
                                                <div class="form-group">
                                                   <label class="pl-10">Time</label>
                                                   <div class="input-group input-group-merge">
                                                      <input name="" type="time" value="" placeholder="Time" class="form-control form-control-prepended event_tm"/>
                                                      
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
                                                <input type="text" placeholder="Event Title" name="" class="event_title form-control"/>
                                             </div>
                                             <div class="form-group m-auto w-380">
                                                <label class="pl-10">Keynotes</label>
                                                <textarea name="keynotesnt_title" type="text" rows="4" placeholder="Keynotesnt Title" class="form-control keynotesnt_title"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6  mb-4">
                                          <div class="rounded border p-4 custom-input-block">
                                             <h4 class="block-title text-center mb-5"><span class="orange-text">5 </span>Event About</h4>
                                             <div class="form-group mb-4 m-auto w-380">
                                                <label class="pl-10">About</label>
                                                <input type="text" name="about_event" value="Easily generate Lorem Ipsum..." class="about_event form-control"/>
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
                                       <input name="address" type="text" value="5608 17th Ave NW, Seattle, WA 98107" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                 <div class="rounded border p-4 custom-input-block">
                                    <h4 class="block-title text-center mb-5"><span class="orange-text">8 </span>Any special guests?</h4>
                                    <div class="form-group mb-4 m-auto w-380">
                                       <label class="pl-10">Name</label>
                                       <input name="special_guest[]" type="text" placeholder="Guest Name" value="" class="form-control">
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
                                                   <input name="standard" type="text" class="form-control mb-3" value="Standard"/>	
                                                   <input name="premium" type="text" class="form-control mb-3" value="Premium"/>
                                                   <input type="text" name="vip" class="form-control" value="VIP"/>
                                                </div>
                                             </div>
                                             <div class="col-md-4 ticket-block">
                                                <div class="form-group">
                                                   <label class="pl-10">Price</label>
                                                   <input name="standard_price" type="text" class="form-control mb-3" value="20"/>	
                                                   <input name="premium_price" type="text" class="form-control mb-3" value="200"/>
                                                   <input name="vip_price" type="text" class="form-control" value="800"/>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <label class="pl-10">Number of Ticket</label>
                                                   <input name="standard_tickets" type="text" class="form-control mb-3" value="100"/>	
                                                   <input type="text" name="premium_tickets" class="form-control mb-3" value="30"/>
                                                   <input type="text" name="vip_tickets" class="form-control" value="20"/>
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
                              <button type="submit" class="btn btn-dark text-uppercase">Create Event  <i class="icofont-plus"></i></button>
                           </div>
                        </div>
                     </div>
                  </div>
				  </form>
               </div>
            </section>
            <!--== End Travel& Event Area Wrapper ==-->
         </main>
		<script>
			var dtToday = new Date();
			var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
			var day = dtToday.getDate();
			var year = dtToday.getFullYear();
			if(month < 10)
			   month = '0' + month.toString();
			if(day < 10)
			   day = '0' + day.toString();

			var maxDate = year + '-' + month + '-' + day;
			$('#dateID').attr('min', maxDate);
		</script>
		@include('includes.footer')
	  
   </body>
</html>