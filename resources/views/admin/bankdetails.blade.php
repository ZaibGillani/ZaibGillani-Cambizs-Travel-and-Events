@extends('layout')  
@section('content')
@include('event_user.include.head')
   <body>
      <!--wrapper-->
      <div class="wrapper">
		<!--start page wrapper -->
		<!--sidebar wrapper -->
		@include('event_user.include.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('event_user.include.header')
		<!--end header -->
		<!--start page wrapper -->
      <div class="page-wrapper">
         <div class="page-content">
            <div class="d-flex align-items-center mb-4">
               <div>
                  <h3 class="mb-0"> <i class='bx bx-cog text-orange'></i> Settings</h3>
               </div>
            </div>
            <div class="card radius-10 bg-light-primary">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-2">
                        <ul class="nav payment-list mb-4" role="tablist">
                          
                           <li class="nav-item" role="presentation">
                              <a class="nav-link active" data-bs-toggle="pill" href="#bank-pills-profile" role="tab" aria-selected="false">
                                 <div class="d-flex align-items-center">
                                    <i class='bx bxs-dollar-circle'></i> Bank Details
                                 </div>
                              </a>
                           </li>
                          
                        </ul>
                     </div>
                     <div class="col-md-10">
                        <div class="tab-content bg-white p-4" id="danger-pills-tabContent">
                           <div class="tab-pane fade" id="person-pills-home" role="tabpanel">
                           </div>
                           <div class="tab-pane fade  show active" id="bank-pills-profile" role="tabpanel">
                              <h5 class="mt-0 mb-4">Please enter bank account details</h5>
                              <form class="row" id="event_frm" action="{{ route('bank_register') }}" method="post" enctype="multipart/form-data">
							   @csrf
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="inputFirstName" class="form-label mb-0">Account Number</label>
                                       <input type="text" name="account_number" placeholder="Account Number" class="form-control bank_primary" id="#">
                                    </div>
                                    <div class="form-group">
                                       <label for="inputFirstName" class="form-label mb-0">Account Holder Name</label>
                                       <input type="text" name="account_holder_name" placeholder="Account Holder Name" class="form-control bank_primary" id="#">
                                    </div>
                                    <div class="form-group">
                                       <label for="inputFirstName" class="form-label mb-0">Routing Number</label>
                                       <input type="text" name="routing_number" placeholder="Routing Number" class="form-control bank_primary" id="#">
                                    </div>
                                    
                                    <input type="submit" class="btn btn-warning px-4" value="SUBMIT"/>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--end page wrapper -->
         <!--start overlay-->
         <div class="overlay toggle-icon"></div>
		 <style>
			.bank_primary {
				background-color: #F7F9FD!important;
			}
		 </style>
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
</html>