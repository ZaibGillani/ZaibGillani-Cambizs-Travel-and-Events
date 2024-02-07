Admin User@extends('layout')

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
		  <!--start page wrapper -->
         <div class="page-wrapper">
			<?php //echo"<pre>"; print_r($event_users); die; ?>
			
            <div class="page-content">
               <div class="d-flex align-items-center mb-4 pb-2">
                  <div>
                     <h3 class="mb-0"> <i class='bx bxs-dashboard text-orange'></i> All Drivers</h3>
                  </div>
               </div>
              
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stepone" role="tabpanel" aria-labelledby="stepone-tab">
							@if(session()->has('delete_user'))
								<div class="alert alert-success">
									{{ session()->get('delete_user') }}
								</div>
							@endif
						   @if(!$driver_data->isEmpty()) 
                           <div class="table-responsive">
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Joinging Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
									<?php //echo "<pre>"; print_r($event_users); die; ?>
									@foreach($driver_data as $data)
										<tr>
										   <td>
											  <div class="d-flex align-items-center">
												 
												 <div class="ms-2">
													<h6 class="mb-0">{{$data->name}}</h6>
												 </div>
											  </div>
										   </td>
										   <td>
											  <div class="d-flex align-items-center">
												 
												 <div class="ms-2">
													<h6 class="mb-0">{{$data->email}}</h6>
												 </div>
											  </div>
										   </td>
											@php
												$timestamp = strtotime($data->created_at);  												
											@endphp
										   <td>{{date('d-F-Y', $timestamp )}}</td>
										   <td><a href="view_driver_admin/{{$data->id}}">Edit</a> | <a href="delete_driver/{{$data->id}}">Delete</a></td>
										</tr>
									@endforeach
                                 </tbody>
                              </table>
                           </div>
						   @else
							   No, Drivers found
						   @endif
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
	