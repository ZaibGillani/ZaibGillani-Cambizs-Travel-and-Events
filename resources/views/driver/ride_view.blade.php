<style>
/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
/* 
 * Always set the map height explicitly to define the size of the div element
 * that contains the map. 
 */
#map {
  height: 100%;
}

/* 
 * Optional: Makes the sample page fill the window. 
 */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: "Roboto", "sans-serif";
  line-height: 30px;
  padding-left: 10px;
}

:root {
  --select-border: #393939;
  --select-focus: #101484;
  --select-arrow: var(--select-border);
}

select {
  // styles reset, including removing the default dropdown arrow
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-color: transparent;
  border: none;
  padding: 0 1em 0 0;
  margin: 0;
  width: 100%;
  font-family: inherit;
  font-size: inherit;
  cursor: inherit;
  line-height: inherit;

  // Stack above custom arrow
  z-index: 1;

  // Remove focus outline
  outline: none;
}

.select {
  display: grid;
  grid-template-areas: "select";
  align-items: center;
  position: relative;

  select,
  &::after {
    grid-area: select;
  }

  min-width: 15ch;
  max-width: 30ch;
  border: 1px solid var(--select-border);
  border-radius: 0.25em;
  padding: 0.25em 0.5em;
  font-size: 1.25rem;
  cursor: pointer;
  line-height: 1.1;

  // Optional styles
  // remove for transparency
  background: linear-gradient(to bottom, #ffffff 0%, #e5e5e5 100%);

  // Custom arrow
  &::after {
    content: "";
    justify-self: end;
    width: 0.8em;
    height: 0.5em;
    background-color: var(--select-arrow);
    clip-path: polygon(100% 0%, 0 0%, 50% 100%);
  }
}
select:focus + .focus {
  position: absolute;
  top: -1px;
  left: -1px;
  right: -1px;
  bottom: -1px;
  border: 2px solid var(--select-focus);
  border-radius: inherit;
}
#seat_selection{
	display:block !important;
}
.nice-select{
	display:none !important;
}
</style>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('includes.head')

   
	<body>
		@include('includes.header')
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                     <h2>Ride Information</h2>
                  </div>
               </div>

            </section>
			<form method="post" action="{{route('book_ride_form')}}">
				@csrf
				<section class="first-block mtb-80">
					   <div class="container">
						  <div class="row">
							<div class="col-lg-12 col-xl-6 mb-4">
								<div style="display:none; ">
									<input type="hidden" name="ride_price" id="ride_id" value="{{$ride_information['price']}}">
									<input type="hidden" name="ride_id" id="ride_id" value="{{$ride_information['id']}}">
									<input type="hidden" name="driver_id" id="driver_id" value="{{$ride_information['driver_id']}}">
									<input type="text" name="source" id="source" value="{{$ride_information['pickup_location']}}">
									<input type="text" name="destination" id="destination" value="{{$ride_information['drop_location']}}">
									<input type="button" id="sbt_btn" value="submit">
								</div>
								<div id="floating-panel2">
									
									<div id="msg" class="col-sm-12 col-md-12 mb-2 text-uppercase orange-text"></div>
									<div id ="distance" ></div>
									<div id ="duration"></div>
								</div>
								<div id="map"></div>
							</div>
							<div class="col-lg-12 col-xl-6 mb-4">
								<div class="subtitle-content">
								   <h5 class="m-0 text-uppercase">{{$ride_information['pickup_location']}} to {{$ride_information['drop_location']}}</h5>
								</div>
								<h2 class="mb-3"><strong>test</strong></h2>
							   
								<div class="row">
								   <div class="col-sm-12 col-md-4 mb-4">
									  <h6 class="text-uppercase orange-text">Journey Date</h6>
									  <p class="m-0">{{$ride_information['journey_date']}}</p>
									  
								   </div>
								   <div class="col-sm-12 col-md-4 mb-4">
									  <h6 class="text-uppercase orange-text">Pickup Time & Drop Time</h6>
									  <p class="m-0">{{$ride_information['pickup_time']}} && {{$ride_information['drop_time']}}</p>
									  
								   </div>
								   <div class="col-sm-12 col-md-4 mb-4">
									  <h6 class="text-uppercase orange-text">Car Make</h6>
									  <p class="m-0">{{$ride_information['car_make']}}</p>
								   </div>
								   <div class="col-sm-12 col-md-4 mb-4">
									  <h6 class="text-uppercase orange-text">Registration Number</h6>
									  <p class="m-0">{{$ride_information['registration_number']}}</p>
								   </div>
								   <div class="col-sm-12 col-md-4 mb-4">
									  <h6 class="text-uppercase orange-text">Car Type</h6>
									  <p class="m-0">{{$ride_information['car_make']}}</p>
								   </div>
								   <div class="col-sm-12 col-md-4 mb-4">
									  <h6 class="text-uppercase orange-text">Car Seat</h6>
										@if($ride_information['car_seat'])
											<select id="seat_selection" multiple name="seat_selection[]">
												@foreach($ride_information['car_seat'] as $info)
													<option>{{ $info }}</option>
												@endforeach
											</select>
										@else
											Sorry, Currently all the seats are booked. 
										@endif
										
								   </div>
								   <div class="col-sm-12 col-md-4 mb-4">
								   @if($ride_information['car_seat'])
										<input type="submit" class="submit_ride_btn_n btn btn btn-outline-dark mw-120 text-uppercase" value="Submit" name="submit_ride" />
									@endif
								   </div>
								</div>
						</div>
					</div>
				</section>
				
			</form>
		
		</main>
    <!-- 
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
   

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI8JRxhktZC6AZMVJZNF6jBJ52sXEb_dc&callback=initMap&v=weekly&libraries=places"
      defer
    ></script>
	<script>
		
		function haversine_distance(mk1, mk2) {
			var R = 3958.8; // Radius of the Earth in miles
			var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
			var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
			var difflat = rlat2-rlat1; // Radian difference (latitudes)
			var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)
			var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
			return d;
		}
		// Calculate and display the distance between markers
		/*var distance = haversine_distance(mk1, mk2);
		document.getElementById('msg').innerHTML = "Distance between markers: " + distance.toFixed(2) + " mi.";*/
		function initMap() {
		  const directionsService = new google.maps.DirectionsService();
		  const directionsRenderer = new google.maps.DirectionsRenderer();
		  const map = new google.maps.Map(document.getElementById("map"), {
			zoom: 7,
			center: { lat: 41.85, lng: -87.65 },
		  });

		  directionsRenderer.setMap(map);

		  const onChangeHandler = function () {
			calculateAndDisplayRoute(directionsService, directionsRenderer);
		  };

		  //document.getElementById("sbt_btn").addEventListener("change", onChangeHandler);
		  document.getElementById("sbt_btn").addEventListener("click", onChangeHandler);
		}

		function calculateAndDisplayRoute(directionsService, directionsRenderer) {
		  directionsService
			.route({
			  origin: {
				query: document.getElementById("source").value,
			  },
			  destination: {
				query: document.getElementById("destination").value,
			  },
			  travelMode: google.maps.TravelMode.DRIVING,
			})
			.then((response) => {
			  console.log("response", response)
			  //console.log(response.routes)
			  var distance  = response.routes[0].legs[0].distance.text;
			  var duration  = response.routes[0].legs[0].duration.text;
			  //console.log("Legs",response.routes[0].legs[0].distance)
			  var directionsData = response.routes[0].legs[0];
			  document.getElementById('msg').innerHTML = " Driving distance is " + directionsData.distance.text + " (" + directionsData.duration.text + ")."
			  directionsRenderer.setDirections(response);
			})
			.catch((e) => window.alert("Directions request failed due to " + status));
		}

		window.initMap = initMap;
	</script>
	
	<script>
					// scripts.js custom js file
		$(document).ready(function () {
		   google.maps.event.addDomListener(window, 'load', initialize);
		   
			$("#sbt_btn").trigger('click');
		   
		});
				

		function initialize() {
			var source = document.getElementById('source');
			var destination = document.getElementById('destination');
			var autocomplete = new google.maps.places.Autocomplete(source);
			var autocomplete = new google.maps.places.Autocomplete(destination);
		}
	</script>
		
		@include('includes.footer')
	 </body>
</html>
		
		