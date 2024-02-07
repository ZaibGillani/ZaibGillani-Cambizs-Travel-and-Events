<!--== Start Footer Area Wrapper ==-->
         <footer class="footer-area">
            <div class="container" data-aos="fade-up" data-aos-duration="1000">
               <div class="row">
                  <div class="col-md-3 col-lg-3 col-xl-3 mb-5">
                     <div class="widget-item mt-0">
                        <div class="about-widget">
                           <a class="footer-logo" href="index.html">
                           <img src="{{ url('/img/logo.png')}}" alt="Logo">
                           </a>
                           <p class="mt-3">It is a long established fact that a reader
                              will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  here.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3 mb-5">
                     <div class="widget-item menu-wrap-column">
                        <h4 class="widget-title">Links</h4>
                        <nav class="widget-menu-wrap">
                           <ul class="nav-menu nav">
                              <li><a href="index.html">Agriculture & All Foods  </a></li>
                              <li><a href="index.html">Vehicles & Accessories </a></li>
                          
                              <li><a href="index.html">Household & Office </a></li>
                              <li><a href="index.html">Electronic Technology </a></li>
                              <li><a href="index.html">More</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3 mb-5">
                     <div class="widget-item menu-wrap-column">
                        <h4 class="widget-title">Cambizs</h4>
                        <nav class="widget-menu-wrap">
                           <ul class="nav-menu nav">
                              <li><a href="index.html">What is Cambizs?</a></li>
                              <li><a href="index.html">Our Blog</a></li>
                              <li><a href="index.html">Contact</a></li>
                              <li><a href="index.html">Building Contractor</a></li>
                              <li><a href="index.html">Seller</a></li>
                              <li><a href="index.html">Agent</a></li>
                              <li><a href="index.html">Vendor</a></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3 mb-5">
                     <div class="widget-item menu-wrap-column">
                        <h4 class="widget-title">Subscribe</h4>
                        <p>Sign up for our mailing list to get latest updates and offers.</p>
                        <div class="widget-newsletter mb-4">
                           <form action="#">
                              <input type="email" class="form-control" placeholder="Email Address">
                              <button type="submit" class=""><i class="icofont-paper-plane"></i></button>
                           </form>
                        </div>
                        <div class="widget-social-icons">
                           <a href="#/"><i class="icofont-facebook"></i></a><br/>
                           <a href="#/"><i class="icofont-twitter"></i></a><br/>
                           <a href="#/"><i class="icofont-instagram"></i></a><br/>
                           <a href="#/"><i class="icofont-linkedin"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-bottom">
               <div class="container">
                  <div class="footer-bottom-content">
                     <div class="widget-copyright text-center">
                        <p>© 2021 Cambizs All rights reserved.</p>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!--== End Footer Area Wrapper ==-->
         <!--== Start Side Menu ==-->
         <aside class="off-canvas-wrapper">
            <div class="off-canvas-inner">
               <div class="off-canvas-overlay"></div>
               <!-- Start Off Canvas Content Wrapper -->
               <div class="off-canvas-content">
                  <!-- Off Canvas Header -->
                  <div class="off-canvas-header">
                     <div class="logo-area">
                        <a href="index.html"><img src="{{ url('/img/black-logo.png')}}" alt="Logo" /></a>
                     </div>
                     <div class="close-action">
                        <button class="btn-close"><i class="icofont-close"></i></button>
                     </div>
                  </div>
                  <div class="off-canvas-item">
                     <!-- Start Mobile Menu Wrapper -->
                     <div class="res-mobile-menu menu-active-one">
                        <!-- Note Content Auto Generate By Jquery From Main Menu -->
                     </div>
                     <!-- End Mobile Menu Wrapper -->
                  </div>
                  <!-- Off Canvas Footer -->
                  <div class="off-canvas-footer"></div>
               </div>
               <!-- End Off Canvas Content Wrapper -->
            </div>
         </aside>
         <!--== End Side Menu ==-->  
      </div>
		
      <!--=======================Javascript============================-->
      <!--=== Modernizr Min Js ===-->
      <script src="{{ url('/js/modernizr.js') }}assets/js/modernizr.js"></script>
      <!--=== jQuery Main Js ===-->
	  
	    
      <!--=== jQuery Migration Min Js ===-->
      <script src="{{ url('/js/jquery-migrate.js') }}"></script>
      <!--=== Popper Min Js ===-->
      <script src="{{ url('/js/popper.min.js') }}"></script>
      <!--=== Bootstrap Min Js ===-->
      <script src="{{ url('/js/bootstrap.min.js') }}"></script>
      <!--=== jquery UI Min Js ===-->
      <script src="{{ url('/js/jquery-ui.min.js') }}"></script>
      <!--=== jquery Appear Js ===-->
      <script src="{{ url('/js/jquery.appear.js') }}"></script>
      <!--=== jquery Swiper Min Js ===-->
      <script src="{{ url('/js/swiper.min.js') }}"></script>
      <!--=== jquery Aos Min Js ===-->
      <script src="{{ url('/js/aos.min.js') }}"></script>
      <!--=== jquery Tilt Animation Js ===-->
      <script src="{{ url('/js/tilt-animation.js') }}"></script>
      <!--=== jquery Slicknav Js ===-->
      <script src="{{ url('/js/jquery.slicknav.js') }}"></script>
      <!--=== jquery Wow Min Js ===-->
      <script src="{{ url('/js/wow.min.js') }}"></script>
      <!--=== Custom Js ===-->
      <script src="{{ url('/js/custom.js') }}"></script>
      <!--=== Nice Select Js ===-->
      <script src="{{ url('/js/jquery.nice-select.min.js') }}"></script>
     
		<script>

			forgotPassword = () => {
				$('.login_form_wrapper').hide();
				$('.forgot-password-form-wrapper').show();
				$('.text-danger').html('');
				$('.text-danger').hide();
				$(".text-success").html('');
				$(".text-success").hide();
			}

			backToLogin = () => {
				$('.login_form_wrapper').show();
				$('.forgot-password-form-wrapper').hide();
				$('.text-danger').html('');
				$('.text-danger').hide();
				$(".text-success").html('');
				$(".text-success").hide();
			}

			openAuthModal = (value) => {
				if (value == 'signup'){
					$('#signup_tab').modal('show');
					$('#login_tab').modal('hide');
				}else if (value == 'login'){
					$('#signup_tab').modal('hide');
					$('#login_tab').modal('show');
				}
			}


			$(document).ready(function() {
    		
			});

		
		
			$(document).ready(function () {
				function checkWidth() {
				if ($(window).width() < 700) {
					$('#yourElement').removeClass('yourClass');
				} else {
					$('#yourElement').addClass('yourClass');
				}
   			 }

   			 checkWidth();
				$(window).resize(function() {
					checkWidth();
				});
				
				$('.text-danger').hide();
				$('.text-success').hide();


				$('.login_form_wrapper').show();
				$('.forgot-password-form-wrapper').hide();
				
				/***user role radtio button****/
				
				$(document).on('click', '.slct_role_main label', function (event) {
					$(".slct_role_main label").removeClass("active");
					$(this).addClass("active");
				});
				
				/***********ticket buy*********/
					console.log('vggg');
					/* $(".buy_ticket").click(function(e){ 
						e.preventDefault();
						var select_ticket_type = $(".select_ticket_name.selected").text();
						var ticket_price = $(".getpri.active").text();
						var ticket_id = $(".ticket_id").val();
						$(".ticket_price").val(ticket_price);
						$(".ticket_id").val(ticket_id);
						$(".select_ticket_type").val(select_ticket_type);
						
						var tick_pri = $(".ticket_price").val();
						console.log(tick_pri);
						if(tick_pri==''){
							alert("empty price");
							return false;
						}
						$("#payment-form").submit();
						//var data_n = {'ticket_type':select_ticket_type,'ticket_price':ticket_price,'ticket_id':ticket_id, _token: '{{csrf_token()}}'};
						$.ajax({
							url     : '/payment_process',
							type    : 'post',
							data    : data_n,
							success : function (json)
							{
								alert(json);
								// Success
								// Do something like redirect them to the dashboard...
							},
							error: function( json )
							{
								$("body").addClass("preloader-deactive");
								//alert(json.responseJSON.message);
								jQuery(".text-danger").html('');
								jQuery(".text-danger").html(json.responseJSON.message);
							
							}
						});
					}); */
 
				var form = $('#form_register');
			 
				form.submit(function(e) {
					
					e.preventDefault();

					$("body").removeClass("preloader-deactive");
					// var get_role = $(".slct_role_main .active").attr("for");
					
					
					$.ajax({
						url     : form.attr('action'),
						type    : form.attr('method'),
						data    : form.serialize(),
						dataType: 'json',
						success : function ( json )
						{
							console.log(json);
							$("body").addClass("preloader-deactive");
							if(json.status == true){
								//alert("Registered Successfully");
								$('.text-danger').hide();
								$(".text-success").show();
								$(".text-success").html("Account created successfully");
								setTimeout(function(){ 
									// 	$('.modal-body').scrollTop(0);
									// reload the page
									window.location.reload();
								}, 500);
								
								// return false;
							}
							
							// Success
							// Do something like redirect them to the dashboard...
						},
						error: function( json )
						{
							console.log(json.complete);
							if(json.status == 422){
								$("body").addClass("preloader-deactive");
								$(".text-success").hide();
								$('.text-danger').show();
								$('.text-danger').html(json.responseJSON.message);
								setTimeout(function(){ 
									$('.modal-body').scrollTop(0);
								}, 500);
								return false;
							}

							// $("body").addClass("preloader-deactive");
							// //alert(json.responseJSON.message);
							// jQuery(".text-danger").html('');
							// jQuery(".text-danger").html(json.responseJSON.message);
							// setTimeout(function(){ 
							// 	$('.modal-body').scrollTop(0);
							// }, 500);
							// return false;
						}
					});
				});
				
				/*****check for the ticket status*****/
				
				
				/***login****/
				
				var form1 = $('#login_frm');
			 
				form1.submit(function(e) {
			 
					e.preventDefault();
					$("body").removeClass("preloader-deactive");
					$.ajax({
						url     : form1.attr('action'),
						type    : form1.attr('method'),
						data    : form1.serialize(),
						dataType: 'json',
						success : function ( json )
						{
							var getUrl = window.location;
									console.log(getUrl);
							$("body").addClass("preloader-deactive");
								var string1 = JSON.stringify(json);

								var parsed = JSON.parse(string1); 
								
								if(parsed['message']=="success" && parsed['role']!="role_admin"){
									location.reload();
								} else if(parsed['message']=="success" && parsed['role']=="role_admin"){
									location.reload();
								} else{
									jQuery(".error").html('');
									jQuery(".error").html('Username and Password are not valid');
									jQuery(".error").show();
								}
						//	}
							
							// Success
							// Do something like redirect them to the dashboard...
						},
						error: function( json )
						{
							$("body").addClass("preloader-deactive");
							alert(json.responseJSON.message);
							
						}
					});
				});


				/****forgot password****/
				var form2 = $('#forgot_pwd_frm');

				form2.submit(function(e) {
					e.preventDefault();
					$("body").removeClass("preloader-deactive");
					$.ajax({
						url     : form2.attr('action'),
						type    : form2.attr('method'),
						data    : form2.serialize(),
						dataType: 'json',
						success : function ( json )
						{
							$("body").addClass("preloader-deactive");
							if(json.status == true){
								$('.text-danger').hide();
								$(".text-success").show();
								$(".text-success").html("Password reset link sent to your email");
								setTimeout(function(){ 
									// 	$('.modal-body').scrollTop(0);
									// reload the page
									// window.location.reload();
								}, 500);
								
								// return false;
							}
						},
						error: function( json )
						{
							$("body").addClass("preloader-deactive");
							if(json.status == 422){
								$(".text-success").hide();
								$('.text-danger').show();
								$('.text-danger').html(json.responseJSON.message);
								setTimeout(function(){ 
									$('.modal-body').scrollTop(0);
								}, 500);
								return false;
							}
						}
					});
				});
				
				/***event submit****/
				var ik = 1;
				$(".event_cat_slct .col-auto a").click(function(e){
					$(".event_cat_slct .col-auto a").removeClass("active");
					$(this).addClass("active");
					var getvl = $(this).attr('attr');
					console.log(getvl);
					
					$(".event_category").val(getvl);
				});
				
				$(".cat_slct").click(function(e){
					$('input:text').each(function(){
						$(this).val('');
					});
					$('input:date').each(function(){
						$(this).val('');
					});
					$('textarea').each(function(){
						$(this).val('');
					});
				});
				
				$(document).on('click', '.cls_i', function(){ 
					var getvl = $(this).attr("atr");
					$("."+getvl+"-rm_d").remove();
				}); 
				
				$(".add_more").click(function(e){
					$(".add_more_content").append('<div class="'+ik+'-rm_d int_fld_div"><input placeholder="Guest Name" name="special_guest[]" type="text" class="'+ik+'-inc form-control"><i atr="'+ik+'" class="'+ik+'-rm icofont-close-line cls_i"></i></div>');
					ik++;
				});
				
				$(".select_ticket_name").click(function(e){
					var getatr = $(this).attr("data-value");
					console.log(getatr);
					console.log("."+getatr+"pri");
					$(".getpri").hide();
					$("."+getatr+"pri").show();
					$(".nice-select .current").text(getatr);
					$(".getpri").removeClass("active");
					$("."+getatr+"pri").addClass("active");
				});
				
				$(".evnt_tp").click(function(e){
					$(".evnt_tp").removeClass("active");
					$(this).addClass("active");
					var get_ent = $(this).val();
					
					$(".event_type").val(get_ent);
				});
				
				$(".next_btn").click(function(e){
					$(".event_sction").hide();
					$("#steptwo-tab").trigger('click');
				});
				
				
				
				$("#event_frm").submit(function(e){
					e.preventDefault();
					$("body").removeClass("preloader-deactive");
					$('.event_title').each(function(){
						var getvl = $(this).val();
						if(getvl!=''){
							console.log(getvl);
							$(".event_title_hidden").val(getvl);
						}
					});
					$('.event_tm').each(function(){
						var getvl_tim = $(this).val();
						if(getvl_tim!=''){
							console.log(getvl_tim);
							$(".event_time_hidden").val(getvl_tim);
						}
					});
					$('.event_dt').each(function(){
						var getvl_date = $(this).val();
						if(getvl_date!=''){
							console.log(getvl_date);
							$(".event_date_hidden").val(getvl_date);
						}
					});
					
					
					 $.ajax({
						type: 'POST',
						url: $("#event_frm").attr('action'),
						data: new FormData(this),
						dataType: 'json',
						contentType: false,
						cache: false,
						processData:false,
						beforeSend: function(){
							$('.submitBtn').attr("disabled","disabled");
							$('#fupForm').css("opacity",".5");
						},
						success: function(json){ //console.log(response);
							var string1 = JSON.stringify(json);
								var parsed = JSON.parse(string1); 
								if(parsed['message']=="success"){
									alert("New event created successfully");
									$("body").addClass("preloader-deactive");
									location.reload();
								} else{
									$("body").addClass("preloader-deactive");
									jQuery(".invalid-feedback").html('');
									jQuery(".invalid-feedback").html('Invalid Details');
									jQuery(".invalid-feedback").show();
								}
						}
					});
					
				});
				
				/***userstatus****/
				$(".user_status").click(function(e){
					//$("body").removeClass("preloader-deactive");
					alert("sdsdfsdf");
					var getcvalue = $(this).attr('btnatr');
					var user_status = $(".usr_"+getcvalue).val();
					var user_id = $('.user_id'+getcvalue).val();
					var token = $('meta[name="csrf-token"]').attr('content');
					var data = {"user_status": user_status,"user_id":user_id}; 
					//alert(getid);
					$.ajax({
						url     : 'http://flymyt.com/laravel/public/update_user_status',
						type    : 'get',
						
						contentType: false,
						data: data,
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						success : function ( json )
						{
							var getUrl = window.location;
							//$("body").addClass("preloader-deactive");
									location.reload();
							/* $("body").addClass("preloader-deactive");
								var string1 = JSON.stringify(json);

								var parsed = JSON.parse(string1);  */
								
						},
						error: function( json )
						{
							//$("body").addClass("preloader-deactive");
							//$("body").addClass("preloader-deactive");
							alert(json.responseJSON.message);
							
						}
					});
				});
				
				/*****postpond ticket****/
				
				$(".postpond_event").click(function(e){
					var getid = $(this).attr('attr_id');
					var getinc = $('#event_'+getid).val();
					var token = $('meta[name="csrf-token"]').attr('content');
					var data = {"id": getinc};
					//alert(getid);
					$.ajax({
						//url     : '/postpond_event',
						url     : 'http://flymyt.com/laravel/public/postpond_event',
						type    : 'get',
						
						contentType: false,
						data: data,
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						success : function ( json )
						{
							var getUrl = window.location;
									location.reload();
							/* $("body").addClass("preloader-deactive");
								var string1 = JSON.stringify(json);

								var parsed = JSON.parse(string1);  */
								
						},
						error: function( json )
						{
							$("body").addClass("preloader-deactive");
							alert(json.responseJSON.message);
							
						}
					});
				});
				
				$(".custom-radio-btn").click(function(e){
					var jou_type = $(this).find('.journey_type').val();
					console.log(jou_type);
					if(jou_type=="Return"){
						$(".return_jou").show();
					} else{
						$(".return_jou").hide();
					}
				});
				
			 
			});


			$(document).ready(function (){
				// Get the hash fragment from the URL
				var hash = window.location.hash;

				var is_auth = "{{ Auth::check() }}";

				if( hash == '#login'){
					if(is_auth){
						// remove the hash from the URL
						history.pushState("", document.title, window.location.pathname + window.location.search);
					} else{
						// open login_tab id modal
						$('#login_tab').modal('show');
					}
				}
				// If a hash exists, try to activate the corresponding tab
				if (hash) {
					$(hash).tab('show');
				}
			});

			
			$(document).ready(function() {
				$('button[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
					console.log('Tab has been changed to: ', e.target.id);
					let arr = ['travel', 'travel-bus', 'travel-train', 'travel-flight', 'travel-cruise', 'events', 'car-booking'];
					if(arr.includes(e.target.id)){
						history.pushState({}, '', '#'+e.target.id);
					}
				});
			});

			$(window).on('hashchange', function() {
				var hash = window.location.hash;
				$(hash).tab('show');
			});
		
		</script>
	
	  
	  <style>
		.event_dt,.event_tm {
			border-right: 2px solid #ddd !important;
		}
		
		.int_fld_div{
			display: flex;
			margin-top: 20px;
		}
		.cls_i{
			margin-left: 10px;
			margin-top: 14px;
		}
	  </style>