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
                     <h2>Order Information</h2>
                  </div>
               </div>

            </section>
			
			<section class="first-block mtb-80">
               <div class="container">
                  <div class="row align-items-center"  data-aos="fade-up"
                     data-aos-duration="1000">
                     <div class="col-lg-12 col-xl-12 mb-12">
                        <p>
							Thank you for purchase. Your ordered ticket id is: {{$order_id}}
                        </p>
                     </div>
					<br/>
					<br/>
					<h4 class='order_details'>Order details</h4>
					<table class="table">
					  <thead>
						<tr>
						  
						  <th scope="col">Name</th>
						  <th scope="col">Ticket Price</th>
						  <th scope="col">Quantity</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php //echo"<pre>"; print_r($booking_info); die; ?>
					  <h6 class="text-uppercase orange-text"><b>Event name: </b>{{$event_name}}</h6>
					  <h6 class="text-uppercase orange-text"><b>Price:</b> £{{$total_price}}</h6>
						@foreach($booking_info as $event_key => $event_val_n)
							<tr>							  
							  <td>{{$event_val_n['ticket_name']}}</td>
							  <td>{{$event_val_n['ticket_price']}}</td>
							  <td>{{$event_val_n['ticket_quantity']}}</td>
							</tr>
						@endforeach
						
					  </tbody>
					</table>
				</div>
			</section>
          
         </main>
         <!--== Start Footer Area Wrapper ==-->
		
		@include('includes.footer')
	 </body>
</html>
		
		