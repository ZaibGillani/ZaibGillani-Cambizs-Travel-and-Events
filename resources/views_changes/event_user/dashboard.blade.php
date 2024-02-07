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
            <div class="page-content">
               <div class="d-flex align-items-center mb-4">
                  <div>
                     <h3 class="mb-0"> <i class='bx bx-calendar-check text-orange'></i> My Events</h3>
                  </div>
               </div>
               <div class="card radius-10 bg-light-primary">
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table align-middle mb-0 table-striped-custom">
                           <thead>
                              <tr>
                                 <th>Events</th>
                                 <th>Time</th>
                                 
                                 <th>Total Earned</th>
								 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
							@foreach($event_data as $event_key => $event_val_n)
								<?php $url = url('/images');
								$img_nm = $event_val_n->event_image;
								$imgurl = $url.'/'.$img_nm; 
								?>
								<tr>
                                 <td>
                                    <div class="d-flex align-items-center">
                                       <div class="recent-product-img">
                                          <img src="{{ $imgurl }}" alt="">
                                       </div>
                                       <div class="ms-2">
                                          <h6 class="mb-0">{{$event_val_n->event_title}}</h6>
                                          <p class="mb-0 font-14">Music event poster template with...</p>
                                       </div>
                                    </div>
                                 </td>
                                 <td>{{$event_val_n->event_time}}</td>
                                 
                                 <td>$614.00</td>
								 
								 <td><a href="{{ url('/dashboard') }}/{{$event_val_n->id}}">Edit</a> / <a>Delete</a></td>
                              </tr>
							@endforeach
                             
                           </tbody>
                        </table>
						
                     </div>
                  </div>
				  
               </div>
			   <div style="text-align:center;">{{ $event_data->links() }}</div>
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