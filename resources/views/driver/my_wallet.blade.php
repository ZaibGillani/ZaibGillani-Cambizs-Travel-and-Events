Admin User@extends('layout')

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
            <div class="page-content">
               <div class="d-flex align-items-center mb-4">
                  <div>
                     <h3 class="mb-0"> <i class='bx bx-wallet text-orange'></i> My Wallet</h3>
                  </div>
               </div>
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <h4 class="mb-4">Request for payout</h4>
                     <div class="row mb-4">
                        <div class="col-md-8">
                           <div class="d-flex">
                              <span class="text-orange pr-1">Note:</span>
                              <p class="mb-0 dark-blue"> Cambizs subtracts 5% processing fee along with the processing fee applied by our third-party
                                 payment processors Paypal/Braintree.
                              </p>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <button class="btn btn-warning text-uppercase float-end w-150">Request Money</button>
                        </div>
                     </div>
                     <ul class="nav payment-list mb-4" role="tablist">
                        <li class="nav-item" role="presentation">
                           <a class="nav-link active" data-bs-toggle="pill" href="#danger-pills-home" role="tab" aria-selected="true">
                              <div class="d-flex align-items-center">
                                 <div class="tab-title">Bank Account</div>
                              </div>
                           </a>
                        </li>
                        <li class="nav-item" role="presentation">
                           <a class="nav-link" data-bs-toggle="pill" href="#danger-pills-profile" role="tab" aria-selected="false">
                              <div class="d-flex align-items-center">
                                 <div class="tab-title">Paypal</div>
                              </div>
                           </a>
                        </li>
                     </ul>
                     <div class="tab-content" id="danger-pills-tabContent">
                        <div class="tab-pane fade show active" id="danger-pills-home" role="tabpanel">
                           <form action="{{ route('bank_add_data') }}"  class="row g-3">
							@csrf
                              <div class="col-md-4">
                                 <label for="inputFirstName" name="" class="form-label">Name</label>
                                 <input type="text" name="inputFirstName" value="" class="form-control" id="inputFirstName">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputLastName" class="form-label">Address</label>
                                 <input type="text" name="inputAddress" value="" class="form-control" id="inputAddress">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputEmail" class="form-label">Routing Number</label>
                                 <input type="text" Value="" name="inputNumber" class="form-control" id="inputNumber">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputEmail" class="form-label">Email</label>
                                 <input type="email" name="inputEmail" value="" class="form-control" id="inputEmail">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputEmail" class="form-label">City</label>
                                 <input type="text" name="inputCity" value="" class="form-control" id="inputCity">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputEmail" class="form-label">Account Number</label>
                                 <input name="inputAccountNumber" type="text" value="" class="form-control" id="inputAccountNumber">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputEmail" class="form-label">Amount</label>
                                 <input name="inputAmount" type="text" value="" class="form-control" id="inputAmount">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputEmail" class="form-label">State</label>
                                 <input type="text" name="inputState" value="" class="form-control" id="inputState">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputEmail" class="form-label">Zip Code</label>
                                 <input type="text" name="inputZipCode" value="" class="form-control" id="inputZipCode">
                              </div>
                           </form>
                        </div>
                        <div class="tab-pane fade" id="danger-pills-profile" role="tabpanel">
                           <form class="row g-3">
                              <div class="col-md-4">
                                 <label for="inputFirstName" class="form-label">Paypal Email</label>
                                 <input type="text" name="inputPaypalEmail" value="" class="form-control" id="inputPaypalEmail">
                              </div>
                              <div class="col-md-4">
                                 <label for="inputLastName" class="form-label">Amount</label>
                                 <input type="text" name="inputAmount" value="" class="form-control" id="inputAmount">
                              </div>
                           </form>
                        </div>
                     </div>
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
    
   </body>
		@include('includes.footer')
	</body>
	