<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('includes.head')

   
	<body>
		@include('includes.header')
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<main class="main-content">
		<!--== Start Banner Area Wrapper ==-->
            <!--== Start Banner Area Wrapper ==-->
            <section class="inner-pages-banner ride-booking-banner">
               <img
			      class="banner-image"
                  src="{{ url('/img/banner/ride-page-banner.jpg') }}"
                  alt="home-banner"
                  />
               <div
                  class="home-slider-sidebar d-none d-xl-block"
                  data-aos="fade-zoom-in"
                  data-aos-duration="1300"
                  >
               </div>
               <div class="content text-center">
                  <h6 class="text-uppercase orange-text" data-aos="fade-down"
                     data-aos-duration="1200">Available</h6>
                  <div
                     class="tittle-wrp mb-4"
                     data-aos="fade-down"
                     data-aos-duration="1000"
                     >
                     <h2>Driver Profile</h2>
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
					<div class="driver-profile-wrap mt-0 p-4">
					@if(!$ride_info->isEmpty())
						@foreach($ride_info as $ride_key => $ride_val)
					
							<div class="row">
							<div class="col-md-12 col-lg-5">
								<div class="row">
									<div class="col-sm-12 col-md-5 mb-3">
										<div class="symbol">
											<img src="{{ url('/images/') }}/{{$ride_val->image}}" alt=""> 
										</div>
									</div>
									<div class="col-sm-12 col-md-7 pr-0 mb-3">
										<div class="driver-info-wrap">
											<h3 class="mb-0 text-dark fw-bold">{{$ride_val->name}}</h3>
											<span class="text-muted">I'm chatty when I feel comfortable</span>
											<ul class="mt-3">
												<li><i class="icofont-star"></i> <span class="text-dark">{{$driver_ratings}} -</span> <span class="text-muted">Ratings</span></li>
												
											</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 col-md-5">
										<a href="view_ride/{{$ride_val->id}}" class="text-uppercase btn btn-dark w-100">Book Now</a>
									</div>
									<div class="col-sm-6 col-md-5">
									@if($driver_profile_telno->tel_no)
										<a href="tel:{{$driver_profile_telno->tel_no}}" class="text-uppercase btn btn-danger"><i class="icofont-ui-call"></i> Call</a>
									
									@endif
									</div>
								</div>
							</div>
							<div class="col-md-12 col-lg-7">
								<div class="d-flex justify-content-end mb-3">
									<span class="me-4 text-muted fw-medium">Member since March 2021</span>
									<a href="#" class="link-tag fw-medium">Report</a>
								</div>
								<div class="border rounded p-4 ride-detial-wrap">
									<h5 class="text-uppercase m-0">Ride Details</h5>
									<div class="row">
									<div class="col-ms-12 col-md-8 col-lg-9">
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
										</div>
										<div class="col-sm-12 col-md-4 col-lg-3 pl-0">
										
                                 <span class="fw-bolder orange-text">{{$ride_val->drop_time}}</span>
                                 <span class="text-muted d-block">{{$ride_val->time_difference}}</span>
                              
										</div>
									</div>
								</div>
							</div>
						</div>
							
						@endforeach
					@endif
						
					</div>
               </div>
            </section>
            <!--== End Travel& Event Area Wrapper ==-->
		
		</main>
		
		@include('includes.footer')
	 </body>
</html>
		
		