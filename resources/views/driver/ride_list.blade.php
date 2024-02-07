<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('driver.include.head_search')
   <body>
      @include('driver.include.header_search')
      <div class="wrapper home-default-wrapper">
       
         <!--== End Header Wrapper ==-->
         <main class="main-content">
            <!--== Start Banner Area Wrapper ==-->
            <section class="inner-pages-banner ride-booking-banner">
               <img src="{{ url('/img/banner/ride-page-banner.jpg') }}" alt="home-banner">
               <div
                  class="home-slider-sidebar d-none d-xl-block"
                  data-aos="fade-zoom-in"
                  data-aos-duration="1300"
                  >
               </div>
               <div class="content text-center">
                  <h6 class="text-uppercase orange-text" data-aos="fade-down"
                     data-aos-duration="1200">Find your favourite Ride</h6>
                  <div
                     class="tittle-wrp mb-4"
                     data-aos="fade-down"
                     data-aos-duration="1000"
                     >
                     <h2>Available Rides</h2>
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
            <section class="available-ride-section">
               <div class="container">
                  <div class="listride-wrap">
					  <div  data-aos="fade-up" data-aos-duration="1000">
						 <div class="table-responsive">
						 <form id="post_ride_form" method="post" action="{{ route('driver_profile') }}">
							@csrf
							<table class="table custom-event-table table-borderless avaible-ride-table">
							   
								@if(!$ride_list->isEmpty()) 
									
								@foreach($ride_list as $ride_key => $ride_val)

								<input type="hidden" name="driver_ride_id" value="{{$ride_val->id}}" />
								<input type="hidden" name="driver_id" value="{{$ride_val->driver_id}}" />
								
								<tr>  
									<td>
										 <div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-3">
												@if($ride_val->image) 
													<img src="{{ url('/images/') }}/{{$ride_val->image}}" class="user-img" alt="user avatar">
												@else
													<img src="assets/img/avatar/150-11.jpg" alt="">
												@endIf
											   
											</div>
											<div class="d-flex justify-content-start flex-column">
											   <a href="driver-profile.html" class="text-dark fw-bolder">{{$ride_val->name}}</a>
											   <span class="text-muted"><i class="icofont-star orange-text"></i> @if($driv_rating[$ride_val->driver_id])
											   {{$driv_rating[$ride_val->driver_id]}} Ratings 
												@else
													No feedback
												@endif</span>
											</div>
										 </div>
									</td>
									
									<td>
										 <div class="d-flex">
											<div class="start-ride d-flex me-3">
											   <div class="me-2"><span class="circle-dot"></span><span class="text-muted">From</span></div>
											   <div><span class="text-dark fw-bolder">{{$ride_val->pickup_location}}</span><span class="text-muted d-block">{{$ride_val->pickup_time}}</span></div>
											</div>
											<div class="seprator-dotted">- - - - -</div>
											<div class="end-ride d-flex ms-3">
											   <div class="me-2"><span class="circle-dot"></span><span class="text-muted">To</span></div>
											   <div><span class="text-dark fw-bolder">{{$ride_val->drop_location}}</span><span class="text-muted d-block">{{$ride_val->drop_time}}</span></div>
											</div>
										 </div>
									  </td>
									  <td>
										 <span class="fw-bolder orange-text">{{$ride_val->drop_time}}</span>
										 <span class="text-muted d-block">{{$ride_val->time_difference}}</span>
									  </td>
									  <td>
										 <input type="submit" class="text-uppercase btn btn-dark float-end" value="Book Now" />
									  </td>
									</tr>
								
								@endforeach
								@else
									<tr><td><span>Sorry, No ride available</span></td></tr>
								@endif

							</table>
							</form>
						 </div>
					  </div>
                  </div>
               </div>
            </section>
            <!--== End Travel& Event Area Wrapper ==-->
         </main>
         <!--== Start Footer Area Wrapper ==-->
     
         <!--== End Footer Area Wrapper ==-->
         <!--== Start Side Menu ==-->
         <aside class="off-canvas-wrapper">
            <div class="off-canvas-inner">
               <div class="off-canvas-overlay"></div>
               <!-- Start Off Canvas Content Wrapper -->
               <div class="off-canvas-content">
                  <!-- Off Canvas Header -->
                  <div class="off-canvas-header">
                     <div class="logo-area">
                        <a href="index.html"><img src="assets/img/black-logo.png" alt="Logo" /></a>
                     </div>
                     <div class="close-action">
                        <button class="btn-close"><i class="icofont-close"></i></button>
                     </div>
                  </div>
                  <div class="off-canvas-item">
                     <!-- Start Mobile Menu Wrapper -->
                     <div class="res-mobile-menu menu-active-one">
                        <!-- Note Content Auto Generate By Jquery From Main Menu -->
                     </div>
                     <!-- End Mobile Menu Wrapper -->
                  </div>
                  <!-- Off Canvas Footer -->
                  <div class="off-canvas-footer"></div>
               </div>
               <!-- End Off Canvas Content Wrapper -->
            </div>
         </aside>
         <!--== End Side Menu ==-->
      </div>
	  
	   @include('includes.footer')

   </body>
</html>