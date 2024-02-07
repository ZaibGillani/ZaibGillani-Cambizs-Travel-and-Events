<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('includes.head')
	<style>
		.checked {
		  color: orange;
		}
		label:before {
		  content: '☆';
		  color: white;
		  font-size: 2em;
		}
		label.on:before {
		  content: '★';
		  color: white;
		}
		.selected_element:before {
		  content: '★'; 
		  color: white;
		  /* uncomment for iOS */
		/*   font-size: 2.4em;
		  top: -0.1em;
		  left: -0.1em; */
		}
		label {  
		  display: inline-block;  
		  cursor: pointer;  
		  position: relative;  
		  padding-left: 25px;  
		  margin-right: 15px;  
		  font-size: 20px; 
		}
		label:before {
		  display: inline-block;
		  width: 20px;
		  height: 20px;
		  margin-right: 10px;
		  position: absolute;
		  left: 0;
		  border-radius: 10px;
		}
		input[type=radio] {
		  display: none;
		  -webkit-appearance: none;
		}

		/* Non-essential */
		.second_blck {
		  margin: 2em;
		  background-color: #448AC1;
		  text-align: center;
		  /* remove gray highlight on tap in iOS */
		  -webkit-tap-highlight-color:transparent;
		}
		.question {
		  margin-bottom: 4em;
		}
		#q1 {
		  margin-top: 2em;
		}
		p {
		  color: #000;
		  font-family: Bitter, sans-serif;
		  font-size: 2em;
		}
		#submit {
		  font-size: 24px;
		  font-family: Bitter, sans-serif;
		  color: #448AC1;
		  background-color: white;
		  width: 80px;
		  height: 80px;
		  border: none;
		  border-radius: 40px;
		}


 
	</style>
   
	<body>
		@include('includes.header')
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                     <h2>Order Ride Information</h2>
                  </div>
               </div>

            </section>
			
			@foreach($order_data as $order_key => $order_val)
			<section class="first-block mtb-80">
               <div class="container">
                  <div class="row align-items-center"  data-aos="fade-up"
                     data-aos-duration="1000">
                     <div class="col-lg-12 col-xl-12 mb-12">
                        <p>
							Thank you for purchase. Your ordered ride id is: {{$order_val->id}}
                        </p>
                     </div>
					<br/>
					<br/>
					<h4 class='order_details'>Order details</h4>
					<table class="table">
					  <thead>
						<tr>
						 
						  <th scope="col">Booking Seat Information</th>
						  <th scope="col">Ticket Price</th>
						  <th scope="col">Date</th>
						</tr>
					  </thead>
					  <tbody>
						<h6 class="text-uppercase orange-text"><b>Driver name: </b>{{$order_val->name}}</h6>
						<h6 class="text-uppercase orange-text"><b>Driver Contact No:</b> {{$order_val->tel_no}}</h6>
						<h6 class="text-uppercase orange-text"><b>Driver Email:</b> {{$order_val->email}}</h6>
						
						<td>{{$order_val->booking_seat}}</td>
						<td>£{{$order_val->booking_price}}</td>
						<td>{{$order_val->booking_date}}</td>
					  </tbody>
					</table>
					
				</div>
			</section>
			@if($data=='no data')
				
			<section class="second_blck first-block mtb-80"><br/>
				<!---start ratings---->
					<input type="hidden" class="driver_id" value="{{$order_val->driver_id}}" />
					<input type="hidden" class="order_id" value="{{$order_val->id}}" />
						
							<div class="question" id="q2">
								<p>How would you rate your overall experience?</p>
								<input type="radio" name="experience" id="b1" value="1">
								<label for="b1" class="slect slect1"></label>
								<input type="radio" name="experience" id="b2" value="2">
								<label for="b2" class="slect slect2"></label>
								<input type="radio" name="experience" id="b3" value="3">
								<label for="b3" class="slect slect3"></label>
								<input type="radio" name="experience" id="b4" value="4">
								<label for="b4" class="slect slect4"></label>
								<input type="radio" name="experience" id="b5" value="5">
								<label for="b5" class="slect slect5"></label>
							</div>
					
					<br/>
			</section>
			@endif
			<p class="thanks_msg" style="display:none;">Thanks, for sharing your feedback.</p>
			@endforeach
         </main>
		 
		 <script>
			$(".slect").click(function(e){
				var get_rat = $(this).attr("for");
				var driver_id = $(".driver_id").val();
				var order_id = $(".order_id").val();
				
				var get_val = get_rat.replace("b","");
				//alert(get_val);
				$(".slect").removeClass("selected_element");
				for(i=1; i<=get_val; i++){
					$(".slect"+i).addClass("selected_element");
					//console.log(".slect"+get_val);
				}
				var data = {"driver_id": driver_id,"order_id":order_id,"ratings":get_val};
				$.ajax({
					url     : '/laravel/public/driver_ratings',
					type    : 'get',
					
					contentType: false,
					data: data,
					success : function ( json )
					{
						if(json=="done"){
							$(".thanks_msg").css("display","block","important"); 
							$("#q2").css("display","none");
						}
						/* $("body").addClass("preloader-deactive");
							var string1 = JSON.stringify(json);

							var parsed = JSON.parse(string1);  */
							
					},
					error: function( json )
					{
						$("body").addClass("preloader-deactive");
						alert(json.responseJSON.message);
					}
				});
			});
		 </script>
         <!--== Start Footer Area Wrapper ==-->
		
		@include('includes.footer')
	 </body>
</html>
		
		