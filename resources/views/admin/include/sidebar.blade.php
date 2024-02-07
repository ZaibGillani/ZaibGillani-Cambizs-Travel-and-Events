 <div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
	   <img src="{{ url('/img/logo.png') }}" class="logo-icon" alt="logo icon">
	   <div>
	   </div>
	   <div class="toggle-icon ms-auto d-none"><i class='bx bx-arrow-to-left'></i>
	   </div>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
	   <li class="mm-active">
		  <a href="{{url('/dashboard')}}">
			 <div class="parent-icon"><i class='bx bx-calendar-check' ></i>
			 </div>
			 <div class="menu-title">Dashboard</div>
		  </a>
	   </li>
	   <li>
		  <a href="{{url('/dashboard_driver')}}">
			 <div class="parent-icon"><i class='bx bx-calendar-check' ></i>
			 </div>
			 <div class="menu-title">Driver Dashboard</div>
		  </a>
	   </li>
	   <li>
		  <a href="{{url('/admin_payout_ride')}}" target="_blank">
			 <div class="parent-icon"><i class='bx bx-credit-card-alt'></i>
			 </div>
			 <div class="menu-title">Payout Request Ride</div>
		  </a>
	   </li>
	   <li>
		  <a href="{{url('admin_payout_artist')}}" target="_blank">
			 <div class="parent-icon"><i class='bx bx-credit-card-alt'></i>
			 </div>
			 <div class="menu-title">Payout Request Artist</div>
		  </a>
	   </li>
	   <li>
		  <a href="{{url('posted_event')}}" target="_blank">
			 <div class="parent-icon"><i class='bx bx-credit-card-alt'></i>
			 </div>
			 <div class="menu-title">Total Events</div>
		  </a>
	   </li>
		<li>
		  <a href="{{url('confirm_payment')}}">
			 <div class="parent-icon"><i class='bx bx-collection' ></i>
			 </div>
			 <div class="menu-title">Confirm Payment</div>
		  </a>
	   </li>
	   <li>
		  <a href="{{url('list_drivers')}}">
			 <div class="parent-icon"><i class='bx bx-collection' ></i>
			 </div>
			 <div class="menu-title">All Drivers</div>
		  </a>
	   </li>
	   <li>
		  <a href="{{url('view_artist')}}">
			 <div class="parent-icon"><i class='bx bx-collection' ></i>
			 </div>
			 <div class="menu-title">All Artists</div>
		  </a>
	   </li>
	</ul>
	<!--end navigation-->
	<footer class="page-footer">
	   <p class="mb-0">Copyright © 2021. All right reserved.</p>
	</footer>
 </div>
		 
	<script>
		
		var origin   = window.location.href;
		console.log(origin);
		jQuery("#menu li a").removeClass('hover');
		$("#menu li a").each(function() {
			var get_href = jQuery(this).attr('href');
			if(origin==get_href){
				jQuery(this).addClass('hover');
			}
		});
	</script>
	<style>
		#menu li a.hover{
			color: #FEC225;
			text-decoration: none;
			background: #245060;
			border-radius: 0 10px 10px 0;
			border-left: 4px solid #FEC225;
		}
	</style>