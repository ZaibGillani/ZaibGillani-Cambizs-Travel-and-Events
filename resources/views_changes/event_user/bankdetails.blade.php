@extends('layout')
  
@section('content')
@include('event_user.include.head')


   <body>
      <!--wrapper-->
      <div class="wrapper">
         <!--sidebar wrapper -->
			@include('event_user.include.sidebar')
         <!--end sidebar wrapper -->
         <!--start header -->
			@include('event_user.include.header')
         <!--end header -->
         <!--start page wrapper -->
         <div class="page-wrapper">
           <div class="col-md-6  mb-4">
			  <div class="rounded border p-4 custom-input-block">
				 <h4 class="block-title text-center mb-5">Add Bank details</h4>
				 <div class="form-group mb-4 m-auto w-380">
					<input type="text" placeholder="Account Number" value="" name="event_title" class="event_title form-control">
				 </div>
				  <div class="form-group mb-4 m-auto w-380">
					<input type="text" placeholder="Account Name" value="" name="event_title" class="event_title form-control">
				 </div>
				  <div class="form-group mb-4 m-auto w-380">
					<input type="text" placeholder="Routing Number" value="" name="event_title" class="event_title form-control">
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
      <!--end wrapper-->
      <!-- Bootstrap JS -->
      
      <!--plugins-->
      <script src="{{ url('public/js/jquery.min.js') }}"></script>
	  <script src="{{ url('public/js/bootstrap.bundle.min.js') }}"></script>
	  <script src="{{ url('public/js/pace.min.js') }}"</script>
      <script src="{{ url('public/js/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
      <!--app JS-->
      <script src="{{ url('public/js/app.js') }}"></script>
   </body>
@endsection