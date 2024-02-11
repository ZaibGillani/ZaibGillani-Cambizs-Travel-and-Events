@extends('layout')

	@section('content')
	@include('event_user.include.head')


	<body>
		<!--wrapper-->
		<div class="wrapper">
		 <!--sidebar wrapper -->
			@include('buyer_sidebar')
		 <!--end sidebar wrapper -->
		 <!--start header -->
			@include('event_user.include.header')
		 <!--end header -->
		 <!--start page wrapper -->
		  <!--start page wrapper -->
         <div class="page-wrapper">
			<?php //echo"<pre>"; print_r($event_users); die; ?>
			
            <div class="page-content">
               <div class="d-flex align-items-center mb-4 pb-2">
                  <div>
                     <h3 class="mb-0"> <i class='bx bxs-dashboard text-orange'></i> Buyer Dashboard</h3>
                  </div>
               </div>
               <div class="dashboard-info-block dashboard-info-main">
                  <ul class="nav nav-tabs step-tab mb-5 d-flex" id="myTab" role="tablist">
                     <li class="nav-item w-25" role="presentation">
                        <a href="" class="nav-link bg-warning" id="stepone-tab" type="button"> 
							<img src="{{ url('/img/icons/icon01.png') }}" alt="#">
							<span> 
								<span class="total-artists-count fw-bold fs-4">Car Booking</span>
							
							</span>
						</a>
                     </li>
                     <li class="nav-item w-25" role="presentation">
                        <a href="" class="nav-link bg-warning" id="steptwo-tab" type="button" role="tab">
							<img src="{{ url('/img/icons/icon02.png') }}" alt="#">
							<span> 
								<span class="total-artists-count fw-bold fs-4" >Flight Booking</span>
					
							</span>
						</a>
                     </li>
                    
                     <li class="nav-item w-25" role="presentation">
						<a href="" class="nav-link bg-warning" id="stepone-tab" type="button"> 
							<img src="{{ url('/img/icons/icon03.png') }}" alt="#">
							<span>
								<span class="total-artists-count fw-bold fs-4"> Event Tickets</span>
								
							</span>
						</a>
                     </li>
					 <li class="nav-item w-25" role="presentation">
						<a href="" class="nav-link bg-warning" id="stepone-tab" type="button"> 
							<img src="{{ url('/img/icons/icon03.png') }}" alt="#">
							<span>
								<span class="total-artists-count fw-bold fs-4">Payments</span>
								
							</span>
						</a>
                     </li>
                  </ul>
               </div>
              
								 
                               
                      
                     
                 
            </div>
         </div>
         <!--end page wrapper -->
		</div>
		@include('includes.footer')
	</body>
	