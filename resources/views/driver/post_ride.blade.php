Admin User@extends('layout')

	@section('content')
	@include('event_user.include.head')


	<body>
	
		<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI8JRxhktZC6AZMVJZNF6jBJ52sXEb_dc&callback=initMap&v=weekly&libraries=places"
      defer
    ></script>
		
		<script>
		/**
		 * @license
		 * Copyright 2019 Google LLC. All Rights Reserved.
		 * SPDX-License-Identifier: Apache-2.0
		 */
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

		
	</script>
	<script>
					// scripts.js custom js file
			$(document).ready(function () {
				window.initMap = initMap;
			   google.maps.event.addDomListener(window, 'load', initialize);
			});

			function initialize() {
				var source = document.getElementById('source');
				var destination = document.getElementById('destination');
				var autocomplete = new google.maps.places.Autocomplete(source);
				var autocomplete = new google.maps.places.Autocomplete(destination);
			}
		</script>
		<!--wrapper-->
		<div class="wrapper">
		 <!--sidebar wrapper -->
			@include('driver.include.sidebar')
		 <!--end sidebar wrapper -->
		 <!--start header -->
			@include('event_user.include.header')
		 <!--end header -->
		 <!--start page wrapper -->
         <div class="page-wrapper">
            <div class="page-content">
				
               <div class="d-flex align-items-center mb-4">
                  <div>
                     <h3 class="mb-0"><i class='bx bxs-car text-orange'></i> Post a Ride</h3>
                  </div>
               </div>
			    @if(session()->has('success'))
					<div class="alert alert-success">
						{{ session()->get('success') }}
					</div>
				@endif
			   <form id="post_ride_form" method="post" action="{{ route('insert_data') }}">
			   @csrf
			   
			   <input type="hidden" name="driver_id" value="{{ Auth::user()->id }}" />
               <div class="payout-info-block">
                  <div class="card radius-10 bg-light-primary">
                     <div class="card-body">
                        <div class="form-group">
                           <div class="row">
                              <div class="col-md-8 col-lg-9">
							      <div id="floating-panel">
								
                                 <label>Journey Type</label>
                                 <div>
                                    <label class="custom-radio-btn">One Side
                                    <input type="radio" name="journey_type" class="journey_type" value="One Side">
                                    <span class="checkmark"></span>
                                    </label>
                                    <label class="custom-radio-btn">Return
                                    <input type="radio" checked="checked" class="journey_type" name="journey_type" value="Return">
                                    <span class="checkmark"></span>
                                    </label>
                                 </div>
                              </div>
							</div>
                              <div class="col-md-4 col-lg-3">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Price</label>
                                    <input type="text" value="" name="price" class="form-control" id="#">
                                 </div>
                              </div>
                           
                        </div>
                        <h5 class="post-ride-heading mb-4 mt-5"><span class="bg-light-primary">Going</span></h5>
                        
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="inputFirstName"  class="form-label mb-0">Pickup Location</label>
                                    <input type="text" name="pickup_location" placeholder="Pickup Location" value="" class="form-control" id="source">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Drop Location</label>
                                    <input name="drop_location" placeholder="Drop Location" type="text" class="form-control" id="destination">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Journey Date</label>
                                    <input type="date" name="journey_date" placeholder="Journey Date" class="form-control" id="#">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Pickup Time</label>
                                    <input type="time" name="pickup_time" placeholder="Pickup Time" class="form-control" id="#">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Drop Time</label>
                                    <input type="time" name="drop_time" placeholder="Drop Time" class="form-control" id="#">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="luggage"  class="form-label mb-0">Luggage (kg)</label>
                                    <input name="luggage" placeholder="Luggage" type="text" class="form-control" id="luggage">
                                 </div>
                              </div>
                           </div>
						   
						     <h5 class="post-ride-heading mb-4 mt-5 return_jou"><span class="bg-light-primary">Returning</span></h5>
                        
                           <div class="row return_jou">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Pickup Location</label>
                                    <input type="text" name="return_pickup_location" class="form-control" id="#">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Drop Location</label>
                                    <input type="text" name="return_drop_location" class="form-control" id="#">
                                 </div>
                              </div>
                           </div>
                           <div class="row return_jou">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Journey  Date</label>
                                    <input type="date" name="return_journey_date" value="2 January 2022" class="form-control" id="#">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Pickup Time</label>
                                    <input type="time" name="return_pickup_time" value="10:00 am" class="form-control" id="#">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Drop Time</label>
                                    <input type="time" name="return_drop_time" value="Golf GT Sports" class="form-control" id="#">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="inputFirstName" class="form-label mb-0">Luggage (kg)</label>
                                    <input type="text" name="return_luggage" value="20" class="form-control" id="#">
                                 </div>
                              </div>
                           </div>
                        
                           <div class="row mt-4">
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="car_make" class="form-label mb-0">Car Make</label>
                                    <input name="car_make" placeholder="Car Make" type="text" value="2019" class="form-control" id="car_make">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="registration_number" class="form-label mb-0">Registration Number</label>
                                    <input name="registration_number" placeholder="Registration Number" type="text" value="TERA34567" class="form-control" id="registration_number">
                                 </div>
                              </div>
                           </div>
                        
                        <div class="row mt-5">
                           <div class="col-md-6">
                              <label class=" ms-3 mb-3">Choose Car Type</label>
                              <div>
                                 <label class="choose-car-btn">
                                 <input type="radio" checked="checked" name="car_type" value="Hatchback">
                                 <span class="img-icon">
                                 <img src="{{url('images/car/img1.png')}}" alt=""/>
                                 </span>
                                 <span class="car-name">Hatchback</span>
                                 </label>
                                 <label class="choose-car-btn">
                                 <input type="radio" name="car_type" value="Sedan">
                                 <span class="img-icon">
                                 <img src="{{url('images/car/img2.png')}}" alt=""/>
                                 </span>
                                 <span class="car-name">Sedan</span>
                                 </label>
                                 <label class="choose-car-btn">
                                 <input type="radio"  name="car_type" value="SUV">
                                 <span class="img-icon">
                                 <img src="{{url('images/car/img3.png')}}" alt=""/>
                                 </span>
                                 <span class="car-name">SUV/Crossover</span>
                                 </label>
                                 
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label class="ms-3 mb-3">Choose Car Seats</label>
                              <label for="cars">Choose a car:</label>
								<div class="form-group">
								<select name="car_seat[]" id="car_seat" multiple>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								</select>
							  </div>
                           </div>
						  
                        </div>
							<!--<input type="button" id="sbt_btn" value="submit">
	  <div id="msg"></div>
	  <div id ="distance"></div>
	  <div id ="duration"></div>-->
    </div>
    <!--<div class="row mt-5"><div id="map"></div></div>-->
						<button type="submit" class="btn btn-warning px-5">Submit</button>
                     </div>
                  </div>
                  
				  </form>
               </div>
            </div>
         </div>
         <!--end page wrapper -->
		</div>
		<style>
		.nice-select{
			display:none;
		}
		#car_seat{
			display:block !important;
			width: 50%;
			padding: 5px;
		}
		</style>
		@include('includes.footer')
	</body>
	