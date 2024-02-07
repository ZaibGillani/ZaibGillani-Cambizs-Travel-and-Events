@extends('layout')
  
@section('content')
@include('event_user.include.head')


   <body>
      <!--wrapper-->
      <div class="wrapper">
		
         <!--start header -->
			@include('event_user.include.header_setting')
         <!--end header -->
         <!--start page wrapper -->
         <div class="setting-page-wrapper">
            <div class="d-flex align-items-center mb-4">
               <div class="setting-page-logo dsd"><img src="{{ url('/images/event_user/black-logo.png') }}" class="logo-icon" alt="logo icon"></div>
               <div>
                  <h3 class="mb-0 mt-4 pt-3"> <i class='bx bx-cog text-orange'></i> Settings</h3>
               </div>
			   
            </div>
            <div class="row justify-content-space">
				<div class="col-md-12">
					@if(session()->has('success'))
						<div class="alert alert-success">
							{{ session()->get('success') }}
						</div>
					@endif
				</div>
               <div class="col-md-8">
                  <div class="bg-light-primary p-4 rounded-3">
                     <h4 class="mb-4">Name and Email</h4>
                     <form method="post" action="{{ route('user_update') }}" enctype="multipart/form-data">
						@csrf
                        <div class="form-group">
                           <label>Name</label>
                           <input class="form-control" name="name" type="text" value="{{$name}}"/>
						   
                        </div>
						<div class="form-group">
							<label>Email</label>
                           <input class="form-control" name="email" type="text" value="{{$email}}"/>
						</div>
						
					   <div class="row mb-5">
						   <div class="col-md-12">
							  <div class="border rounded p-4">
								 <h4 class="block-title text-center mb-5">User Image</h4>
								 
									<img src="{{ url('/img/events/upload-icon.png')}}" alt=""/>
									<span class="orange-text">Drag & drop to upload</span>
									<input type="file" id="myFile" name="user_image">
								
							  </div>
						   </div>
						</div>
						<div class="col-md-12 mt-5 mb-5">
						  <button type="submit" class="btn btn-warning w-150">SAVE</button>
					   </div>
                     </form>
                  </div>
               </div>
               
               <div class="col-md-4">
                  <div class="bg-light-primary p-4 rounded-3">
                     <h4 class="mb-4">Change Password</h4>
                     <form>
                        <div class="form-group">
                           <label>New Password</label>
                           <input value="" class="form-control" type="text"/>
                        </div>
                        <div class="form-group">
                           <label>Confirm Password</label>
                           <input value="" class="form-control" type="text"/>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-md-12 mt-5 mb-5">
                  <button type="button" class="btn btn-warning w-150">SAVE</button>
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
      <script src="{{ url('js/jquery.min.js') }}"></script>
	  <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
	  <script src="{{ url('js/pace.min.js') }}"</script>
      <script src="{{ url('js/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
      <!--app JS-->
      <script src="{{ url('js/app.js') }}"></script>
   </body>
@endsection