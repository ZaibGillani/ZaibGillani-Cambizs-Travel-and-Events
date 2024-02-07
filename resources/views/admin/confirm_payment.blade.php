Admin User@extends('layout')

	@section('content')
	@include('event_user.include.head')


	<body>
		<!--wrapper-->
		<div class="wrapper">
		 <!--sidebar wrapper -->
			@include('admin.include.sidebar')
		 <!--end sidebar wrapper -->
		         <!--start page wrapper -->
         <div class="page-wrapper">
            <div class="page-content">
               <div class="d-flex align-items-center mb-4 pb-2">
                  <div>
                     <h3 class="mb-0"> <i class='bx bx-collection text-orange'></i> Confirm Payments</h3>
                  </div>
               </div>
			   <div class="payment-info-block">
					<div class="card radius-10 bg-light-primary">
						<div class="card-body">
						  
						 <div class="table-responsive">
							<table class="table align-middle mb-0 table-striped-custom">
							   <thead>
								  <tr>
									 <th>Name</th>
									 <th>Pypal gmail</th>
									 <th>Requested Payment</th>
									 <th>(Deduction-5%)</th>
									 <th>Status</th>
								  </tr>
							   </thead>
							   <tbody>
								  <tr>
									 <td>
										<div class="d-flex align-items-center">
										   <div class="recent-product-img">
											  AW
										   </div>
										   <div class="ms-2">
											  <h6 class="mb-0">Alex Wilson</h6>
										   </div>
										</div>
									 </td>
									  <td>alex234wilson@gmail.com</td>
									 
									 <td class="label-text">$614.99</td>
									 <td>$600.00</td>
									 <td class="confirm-status">Confirmed</td>
								  </tr>
								  <tr>
									 <td>
										<div class="d-flex align-items-center">
										   <div class="recent-product-img">
											  OH
										   </div>
										   <div class="ms-2">
											  <h6 class="mb-0">Aliver Harrison</h6>
										   </div>
										</div>
									 </td>
									  <td>aliverHarrison@gmail.com</td>
									 
									 <td class="label-text">$614.99</td>
									 <td>$600.00</td>
									 <td class="confirm-status">Confirmed</td>
								  </tr>
								  <tr>
									 <td>
										<div class="d-flex align-items-center">
										   <div class="recent-product-img">
											  AW
										   </div>
										   <div class="ms-2">
											  <h6 class="mb-0">Alex Wilson</h6>
										   </div>
										</div>
									 </td>
									  <td>alex234wilson@gmail.com</td>
									 
									 <td class="label-text">$614.99</td>
									 <td>$600.00</td>
									 <td class="confirm-status">Confirmed</td>
								  </tr>
								  <tr>
									 <td>
										<div class="d-flex align-items-center">
										   <div class="recent-product-img">
											  OH
										   </div>
										   <div class="ms-2">
											  <h6 class="mb-0">Aliver Harrison</h6>
										   </div>
										</div>
									 </td>
									  <td>aliverHarrison@gmail.com</td>
									 
									 <td class="label-text">$614.99</td>
									 <td>$600.00</td>
									 <td class="confirm-status">Confirmed</td>
								  </tr>
								  <tr>
									 <td>
										<div class="d-flex align-items-center">
										   <div class="recent-product-img">
											  AW
										   </div>
										   <div class="ms-2">
											  <h6 class="mb-0">Alex Wilson</h6>
										   </div>
										</div>
									 </td>
									  <td>alex234wilson@gmail.com</td>
									 
									 <td class="label-text">$614.99</td>
									 <td>$600.00</td>
									 <td class="confirm-status">Confirmed</td>
								  </tr>
								  <tr>
									 <td>
										<div class="d-flex align-items-center">
										   <div class="recent-product-img">
											  OH
										   </div>
										   <div class="ms-2">
											  <h6 class="mb-0">Aliver Harrison</h6>
										   </div>
										</div>
									 </td>
									  <td>aliverHarrison@gmail.com</td>
									 
									 <td class="label-text">$614.99</td>
									 <td>$600.00</td>
									 <td class="confirm-status">Confirmed</td>
								  </tr>
								  <tr>
									 <td>
										<div class="d-flex align-items-center">
										   <div class="recent-product-img">
											  AW
										   </div>
										   <div class="ms-2">
											  <h6 class="mb-0">Alex Wilson</h6>
										   </div>
										</div>
									 </td>
									  <td>alex234wilson@gmail.com</td>
									 
									 <td class="label-text">$614.99</td>
									 <td>$600.00</td>
									 <td class="confirm-status">Confirmed</td>
								  </tr>
								  <tr>
									 <td>
										<div class="d-flex align-items-center">
										   <div class="recent-product-img">
											  OH
										   </div>
										   <div class="ms-2">
											  <h6 class="mb-0">Aliver Harrison</h6>
										   </div>
										</div>
									 </td>
									  <td>aliverHarrison@gmail.com</td>
									 
									 <td class="label-text">$614.99</td>
									 <td>$600.00</td>
									 <td class="confirm-status">Confirmed</td>
								  </tr>
								  
								   </tbody>
							</table>
						 </div>
						</div>
						</div>
						</div>
			
            </div>
         </div>
         <!--end page wrapper -->
		</div>
		@include('includes.footer')
	</body>
	