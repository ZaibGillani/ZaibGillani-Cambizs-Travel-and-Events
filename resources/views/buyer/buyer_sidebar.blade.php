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
			 <div class="menu-title">Home Dashboard</div>
		  </a>
	   </li>
       <li>
		  <a href="{{ route('dashboard.events') }}">
			 <div class="parent-icon"><i class='bx bx-calendar-check' ></i>
			 </div>
			 <div class="menu-title">Events Organizer</div>
		  </a>
	   </li>
	   <li>
		  <a href="{{ route('dashboard.driver') }}">
			 <div class="parent-icon"><i class='bx bx-calendar-check' ></i>
			 </div>
			 <div class="menu-title">Driver Dashboard</div>
		  </a>
	   </li>
	  
     
	
       <li>
		  <a href="{{ route('dashboard.driver') }}">
			 <div class="parent-icon"><i class='bx bx-calendar-check' ></i>
			 </div>
			 <div class="menu-title">Buyer Dashboard</div>
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