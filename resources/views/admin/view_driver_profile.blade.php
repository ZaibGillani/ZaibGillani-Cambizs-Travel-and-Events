@section('content')
	@include('event_user.include.head')


	<body>
		<!--wrapper-->
		<div class="wrapper">
		 <!--sidebar wrapper -->
			@include('admin.include.sidebar')
		 <!--end sidebar wrapper -->
		 <!--start header -->
			@include('event_user.include.header')
		 <!--end header -->
		 <!--start page wrapper -->
         <div class="page-wrapper">
            <div class="page-content">
				
               <div class="d-flex align-items-center mb-4">
                  <div>
                     <h3 class="mb-0"><i class='bx bxs-car text-orange'></i> View Driver Profile</h3>
                  </div>
               </div>
			    
				@if (session('status'))
					<h6 class="alert alert-success">{{ session('status') }}</h6>
				@endif
			   <form method="post" id="driver_profile_update" action="{{ route('driver_profile_update_admin') }}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="id" value="{{$driver_profile_data[0]->id}}" />
                     <h5 class="text-orange mb-4 mt-5">Licence Information</h5>
                     <div class="form-group mb-3">
                        <label class="pl-10">Address</label>
                        <input type="text" name="address" class="form-control" value="{{$driver_profile_data[0]->address}}" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Date of Birth</label>
                           <input type="date" name="dob" class="form-control" value="{{$driver_profile_data[0]->dob}}" required>
                          
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Driver’s License Number</label>
                        <input type="text" name="license_number" class="form-control" value="{{$driver_profile_data[0]->license_number}}" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Expiration Date:</label>
                           <input type="date" name="expiration_date" class="form-control" value="{{$driver_profile_data[0]->expiration_date}}" required>
							
                     </div>
                     <h5 class="text-orange mb-4 mt-5">Vehicle Information</h5>
                     <div class="form-group mb-3">
                        <label class="pl-10">Name(s) of Owner</label>
                        <input type="text" name="owner_name" class="form-control" value="{{$driver_profile_data[0]->owner_name}}" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Address of Owner</label>
                        <input type="text" name="owner_address" class="form-control" value="{{$driver_profile_data[0]->owner_address}}" required>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Year</label>
                                 <input type="text" name="year" class="form-control" value="{{$driver_profile_data[0]->year}}" required>
                               
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Make</label>
                              <input type="text" name="make" class="form-control" value="{{$driver_profile_data[0]->make}}" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">License Plate Number</label>
                              <input type="text" name="license_plate_no" class="form-control" value="{{$driver_profile_data[0]->license_plate_no}}" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Registration Expires</label>
                                 <input type="date" name="registration_express" class="form-control" value="{{$driver_profile_data[0]->registration_express}}" required>
                                
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Seating Capacity</label>
                              <select name="seating_capacity" required>
                                 <option>3 Seater</option>
                                 <option>4 Seater</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Number of Seatbelts</label>
                              <select name="no_seatbelts" required>
                                 <option>3 Seater</option>
                                 <option>4 Seater</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <h5 class="text-orange mb-4 mt-5">Insurance Information</h5>
                     <div class="form-group mb-3">
                        <label class="pl-10">Insurance Information</label>
                        <input type="text" name="insurance_information" class="form-control" value="{{$driver_profile_data[0]->insurance_information}}" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Policy Number</label>
                        <input type="text" name="policy_number" class="form-control" value="{{$driver_profile_data[0]->policy_number}}" required>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Telephone Number</label>
                              <input type="text" name="tel_no" class="form-control" value="{{$driver_profile_data[0]->tel_no}}" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Expiration Date</label>
                                 <input type="date" name="insurance_expiration_date" class="form-control" value="{{$driver_profile_data[0]->insurance_expiration_date}}" required>
                                 
                           </div>
                        </div>
                     </div>
                     <div class="form-group mb-3"> 
                        <label class="pl-10">Liability Limits of Policy</label>
                        <input type="text" name="liability_limits_policy" class="form-control" value="{{$driver_profile_data[0]->address}}" required>
                     </div>
                  
                  <h5 class="text-orange mb-4 mt-5">Document</h5>
                  <a target="_blank" href="{{ url('documents') }}/{{$driver_profile_data[0]->driver_document}}">{{$driver_profile_data[0]->driver_document}}</a>
                  <button type="submit" class="btn go-btn px-4 py-2">Complete</button>
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
	