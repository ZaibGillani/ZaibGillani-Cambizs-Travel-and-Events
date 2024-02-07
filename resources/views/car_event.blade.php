<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI8JRxhktZC6AZMVJZNF6jBJ52sXEb_dc&v=weekly&libraries=places"
      defer
></script>
<script>

	$(document).ready(function () {
		google.maps.event.addDomListener(window, 'load', initialize);
	});

	function initialize() {
		var source = document.getElementById('source');
		var destination = document.getElementById('destination');
		var autocomplete = new google.maps.places.Autocomplete(source);
		var autocomplete = new google.maps.places.Autocomplete(destination);
	}
</script>
<div class="tab-pane fade car-booking-wrap" id="pills-carbooking" role="tabpanel" aria-labelledby="car-booking">
  <ul class="nav nav-pills mb-3  justify-content-center align-items-center" id="pills-tab" role="tablist">
   <li class="nav-item" role="presentation">
	  <button class="nav-link active" id="pills-flight-tab" data-bs-toggle="pill" data-bs-target="#pills-flight" type="button" role="tab" aria-controls="pills-flight" aria-selected="true"><i class="icofont-car"></i> Point To Point</button>
   </li>
   <li class="nav-item" role="presentation">
	  <button class="nav-link" id="pills-bus-tab" data-bs-toggle="pill" data-bs-target="#pills-bus" type="button" role="tab" aria-controls="pills-bus" aria-selected="false"><i class="icofont-airplane-alt"></i> Airport Transfer</button>
   </li>
   <li class="nav-item" role="presentation">
	  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-cruise" type="button" role="tab" aria-controls="pills-cruise" aria-selected="false"><i class="icofont-clock-time"></i> Hourly Rent</button>
   </li>
   <li class="nav-item" role="presentation">
	  <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-train" type="button" role="tab" aria-controls="pills-train" aria-selected="false"><i class="icofont-location-pin"></i> Out Station</button>
   </li>
</ul>
<div class="tab-content child-pane car-booking-content" id="pills-tabContent">
   <div class="tab-pane fade show active p-4" id="pills-flight" role="tabpanel" aria-labelledby="pills-flight-tab">
	 
	  <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
		 <form action="{{ route('search_ride') }}" method="post">
			@csrf
			<div class="row custom-input-style">
			   <div class="col-sm-12 col-md-3 pr-0">
				  <label class="pl-10">Picking Up Location</label>
				  <div class="input-group input-group-merge">
					 <input required id="source" type="text" name="source" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-search-1"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-2 pr-0">
				  <label class="pl-10">Going To</label>
				  <div class="input-group input-group-merge">
					 <input required id="destination" type="text" name="destination" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-search-1"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-2">
				  <label class="pl-10">Date</label>
				  <div class="input-group input-group-merge">
					 <input id="dateID" type="date" name="date" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-calendar"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-3 pl-0">
				  <label class="pl-10">Passenger</label>
				  <div class="custom-select-form">
					 <select name="no_of_passenger" class="wide">
						<option value="" selected>1</option>
						<option value="">2</option>
						<option value=" ">3</option>
						<option value=" ">4</option>
					 </select>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-2"><button type="submit"  data-bs-toggle="modal" data-bs-target="#sign-up-ride" class="btn mt-25">Book now</button></div>
			</div>
		 </form>
	  </div>
   </div>
   <div class="tab-pane fade p-4" id="pills-bus" role="tabpanel" aria-labelledby="pills-bus-tab">
	  <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
		 <li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
		 </li>
		 <li class="nav-item" role="presentation">
			<button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
		 </li>
		 <li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
		 </li>
	  </ul>
	  <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
		 <form>
			<div class="row custom-input-style">
			   <div class="col-sm-12 col-md-3 pr-0">
				  <label class="pl-10">From</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-search-1"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-3 pr-0">
				  <label class="pl-10">To</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-search-1"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-2">
				  <label class="pl-10">Depart</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-calendar"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-2 pl-0">
				  <label class="pl-10">Pessenger</label>
				  <div class="custom-select-form">
					 <select class="wide">
						<option value="" selected>1</option>
						<option value="">2</option>
						<option value=" ">3</option>
						<option value=" ">4</option>
					 </select>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
			</div>
		 </form>
	  </div>
   </div>
   <div class="tab-pane fade p-4" id="pills-cruise" role="tabpanel" aria-labelledby="pills-cruise-tab">
	  <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
		 <li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
		 </li>
		 <li class="nav-item" role="presentation">
			<button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
		 </li>
		 <li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
		 </li>
	  </ul>
	  <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
		 <form>
			<div class="row custom-input-style">
			   <div class="col-sm-12 col-md-3 pr-0">
				  <label class="pl-10">From</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-search-1"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-4 pr-0">
				  <label class="pl-10">To</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-search-1"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-3">
				  <label class="pl-10">Depart</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-calendar"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
			</div>
		 </form>
	  </div>
   </div>
   <div class="tab-pane fade p-4" id="pills-train" role="tabpanel" aria-labelledby="pills-train-tab">
	  <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
		 <li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
		 </li>
		 <li class="nav-item" role="presentation">
			<button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
		 </li>
		 <li class="nav-item" role="presentation">
			<button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
		 </li>
	  </ul>
	  <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
		 <form>
			<div class="row custom-input-style">
			   <div class="col-sm-12 col-md-3 pr-0">
				  <label class="pl-10">From</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-search-1"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-4 pr-0">
				  <label class="pl-10">To</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-search-1"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-3">
				  <label class="pl-10">Depart</label>
				  <div class="input-group input-group-merge">
					 <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
					 <div class="input-group-prepend">
						<div class="input-group-text">
						   <span class="icofont-calendar"></span>
						</div>
					 </div>
				  </div>
			   </div>
			   <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
			</div>
		 </form>
	  </div>
   </div>
</div>

</div>
</div>

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