<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('includes.head')
	<style>
		.bg-arapawa {
			background-color: #17414f;
		}
		.register-page-wrap{
			background-image: url('{{ url('/images/1.jpg') }}');
			background-position: top right;
			background-repeat: no-repeat;
			background-size: 800px 800px;
		}
	</style>
   
	<body class="bg-arapawa register-page-wrap  pace-done">	
      <!--wrapper-->
      <div class="wrapper">
         <!--start page wrapper -->
         <div class="register-page-wrapper">
         <div class="container">
            <div class="row">
               <div class="col-md-7 col-lg-5 px-5">
                  <div class="mb-5"><img src="{{ url('/images/logo-img.png') }}" class="logo-icon" alt="logo icon"></div>
                  <h6>welcome</h6>
                  <h3 class="mb-5">Registration</h3>
                 
                  <form method="post" action="{{ route('complete_driver_registration_submit') }}" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="driver_id" value="{{$id}}" />
                     <h5 class="text-orange mb-4 mt-5">Licence Information</h5>
                     <div class="form-group mb-3">
                        <label class="pl-10">Address</label>
                        <input type="text" name="address" class="form-control" value="" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Date of Birth</label>
                           <input type="date" name="dob" class="form-control" value="" required>
                          
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Driver’s License Number</label>
                        <input type="text" name="license_number" class="form-control" value="" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Expiration Date:</label>
                           <input type="date" name="expiration_date" class="form-control" value="" required>
							
                     </div>
                     <h5 class="text-orange mb-4 mt-5">Vehicle Information</h5>
                     <div class="form-group mb-3">
                        <label class="pl-10">Name(s) of Owner</label>
                        <input type="text" name="owner_name" class="form-control" value="" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Address of Owner</label>
                        <input type="text" name="owner_address" class="form-control" value="" required>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Year</label>
                                 <input type="text" name="year" class="form-control" value="" required>
                               
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Make</label>
                              <input type="text" name="make" class="form-control" value="" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">License Plate Number</label>
                              <input type="text" name="license_plate_no" class="form-control" value="" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Registration Expires</label>
                                 <input type="date" name="registration_express" class="form-control" value="" required>
                                
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
                        <input type="text" name="insurance_information" class="form-control" value="" required>
                     </div>
                     <div class="form-group mb-3">
                        <label class="pl-10">Policy Number</label>
                        <input type="text" name="policy_number" class="form-control" value="" required>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Telephone Number</label>
                              <input type="text" name="tel_no" class="form-control" value="" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group mb-3">
                              <label class="pl-10">Expiration Date</label>
                                 <input type="date" name="insurance_expiration_date" class="form-control" value="" required>
                                 
                           </div>
                        </div>
                     </div>
                     <div class="form-group mb-3"> 
                        <label class="pl-10">Liability Limits of Policy</label>
                        <input type="text" name="liability_limits_policy" class="form-control" value="" required>
                     </div>
                  
                  <h5 class="text-orange mb-4 mt-5">Upload Document</h5>
                  <div class="upload-btn p-5 m-auto text-center mb-5">
                     <span class="text-orange">Drag &amp; drop to upload</span>
                     <input type="file" id="myFile" name="filename" required>
                  </div>
                  <button type="submit" class="btn go-btn px-4 py-2">Complete</button>
				  </form>
               </div>
               <div class="col-md-5 col-lg-7">
               </div>
            </div>
         </div>
         </div>
         <!--end page wrapper -->
         <!--start overlay-->
         <div class="overlay toggle-icon"></div>
         <!--end overlay-->
         <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
         <!--End Back To Top Button-->
      </div>
      @include('includes.footer')
   </body>
</html>