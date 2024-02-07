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
			   
			   @if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif
              
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="stepone" role="tabpanel" aria-labelledby="stepone-tab">
                           <h3 class="mb-4">Total Artists</h3>
						   @if(!$total_artist->isEmpty())
                           <div class="table-responsive">
                              <table class="table align-middle mb-0 table-striped-custom">
                                 <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Email</th>
									   <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
									
									@foreach($total_artist as $artist)
										<tr>
										   <td>
											  <div class="d-flex align-items-center">
												 <div class="ms-2">
													<h6 class="mb-0">{{$artist->name}}</h6>
													<input type="hidden" value="{{$artist->id}}" class="user_id user_id{{$artist->id}}" />
												 </div>
											  </div>
										   </td>
										   <td>{{$artist->email}}</td>
										   @if($artist->status=="" || $artist->status=="0")
											   <input type="hidden" value="1" class="usr_{{$artist->id}} user_status_field" />
												<td><button btnatr="{{$artist->id}}" class="btn btn-warning user_status"><span>Inactive</span></button></td>
											@else
												<input type="hidden" value="0" class="usr_{{$artist->id}} user_status_field" />
												<td><button btnatr="{{$artist->id}}" class="btn btn-success user_status"><span>Active</span></button></td>
											@endif
										   <td><a href="view_artist/{{$artist->id}}">Edit</a> | <a href="remove_artist/{{$artist->id}}">Delete</a></td>
										   
										</tr>
									@endforeach
                                 </tbody>
                              </table>
                           </div>
							<div style="text-align:center;" class="pagination_driver">{{ 	$total_artist->links("pagination::bootstrap-4") }}</div>
							</div>
						   @else
							   Sorry, No ride information found
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
	