 <!--wrapper start-->
      <div class="wrapper home-default-wrapper">
         <!--== Start Preloader Content ==-->
         <div class="preloader-wrap">
            <div class="preloader">
               <span class="dot"></span>
               <div class="dots">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
            </div>
         </div>
         <!--== End Preloader Content ==-->
         <!--== Start Header Wrapper ==-->
         <header class="header-area header-default transparent">
            <div class="top-navigation mb-4">
               <div class="container">
                  <div class="row  justify-content-center">
                     <div class="col-6 col-md-4 d-none d-xl-block">
                        <ul class="d-flex m-0">
                           <li><a href="#">What is Cambizs?</a></li>
                           <li><a href="#">Our Blog</a></li>
                           <li><a href="#">Contact</a></li>
                        </ul>
                     </div>
                     <div class="col-md-3 d-none text-center pt-2 d-none d-xl-block">Your Global One-Stop Shop</div>
                     <div class="col-6 col-md-3 d-none d-xl-block">
                        <ul class="d-flex m-0 black-link">
                           <li><a href="#"></a></li>
                           <li><a href="#"></a></li>
                           <li><a href="#"></a></li>
                           <li><a href="#"></a></li>
                           <li><a href="#"></a></li>
                        </ul>
                     </div>
                     <div class="col-6 col-md-2">
                        <ul class="user-intraction m-0 dfgdgf">
                           
						  
							@if (Auth::check())
								<li>{{Auth::user()->name}}</li>
								<li><a href="{{ url('/logout') }}">Logout</a></li>
							
							@else
								<li><a href="#" data-bs-toggle="modal" data-bs-target="#login_tab">Login</a></li>
								<li><a href="#" data-bs-toggle="modal" data-bs-target="#signup_tab">Register</a></li>
							@endif
						   
                           
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-3 col-sm-3 col-md-2 pr-0 d-block d-xl-none">
                     <div class="header-logo-area">
                        <a href="index.html">
                        <img class="logo-main" src="{{ url('/img/logo.png') }}" alt="Logo" />
                        </a>
                     </div>
                  </div>
                  <div class="col-9 col-md-10 col-xl-5 pr-0">
                     <div class="header-align">
                        <div class="header-navigation-area navigation-style-two">
                           <ul class="main-menu nav justify-content-center">
                              <li class="active"><a href="#"> Agriculture & All Foods</a></li>
                              <li><a href="about.html"> Vehicles & Accessories</a></li>
                           
                           </ul>
                        </div>
                        <div class="header-action-area">
                           <button class="btn-menu d-xl-none">
                           <span></span>
                           <span></span>
                           <span></span>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-3 col-md-2 d-none d-xl-block">
                     <div class="header-logo-area text-center">
                        <a href="index.html">
                        <img class="logo-main" src="{{ url('/img/logo.png') }}" alt="Logo" />
                        </a>
                     </div>
                  </div>
                  <div class="col-md-12 col-xl-5 pl-0">
                     <div class="header-align justify-content-start">
                        <div class="header-navigation-area navigation-style-two">
                           <ul class="main-menu nav justify-content-center">
                              <li><a href="#">Household & Office</a></li>
                              <li><a href="#">Electronic Technology</a></li>
                              <li><a href="#">More</a></li>
                              <li class="search-btn"><button type="submit"><i class="icofont-search-1"></i></button></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!--== End Header Wrapper ==-->
		       <!--== Modal ==-->
      <!-- Sign_In Modal -->  
      <div class="modal fade" id="login_tab" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-xl">
            <div class="modal-content sign-in-block">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
               <div class="modal-body p-0">
                  <div class="row">
                     <div class="col bg-green">
                        <div class="sing-up-wrap">
                           <img src="{{ url('/img/logo.png')}}" class="mb-3 logo-pick" alt="Logo">
                           <h6 class="welcome_cls">welcome</h6>
                           <h3 class="mb-4 login">Login</h3>
                           <form id="login_frm" method="POST" action="{{ route('login.post') }}">
							@csrf
							 <div style='display:none; font-size: 16px; text-align:center;' class="error">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                              <div class="form-group mb-3">
                                 <label class="pl-10">Email</label>
                                 <input id="email" type="email" name="email" class="form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="" placeholder="Email"/>
                              </div>
							  
                                   
                                
                              <div class="form-group mb-4">
                                 <label class="pl-10">Password</label>
                               
								 <input id="password" type="password" placeholder="Password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              </div>
							 
                              <div class="d-flex mb-3">
                                 <button type="submit" class="btn go-btn">Login</button>
                                 
                              </div>
                              <!--<p class="mb-0">Don’t have an account <a href="#">Sign up</a></p>-->
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Sign_In Modal End--> 
      <!-- Sign_Up Modal -->  
      <div class="modal fade" id="signup_tab" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-xl">
            <div class="modal-content sign-up-block">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="icofont-close-line"></i></button>
               <div class="modal-body p-0">
                  <div class="row justify-content-end">
                     <div class="col bg-green">
                        <div class="sing-up-wrap">
                           <img src="{{ url('/img/logo.png')}}" class="mb-3 logo-pick" alt="Logo">
                           <h6>welcome</h6>
                           <h3 class="mb-4">Sign Up</h3>
							<form id="form_register" action="{{ route('register.post') }}" method="POST">
							@csrf
								
								  <span class="text-danger"></span>
								  <span class="text-success"></span>
								
                              <div class="form-group mb-3">
                                 <label class="pl-10">Name</label>
                                
								<input type="text" id="name" class="form-control" placeholder="Name" name="name" required autofocus>
							  </div>
                              <div class="form-group mb-3">
                                 <label class="pl-10">Email</label>
                            
								 <input type="text" id="email_address" placeholder="Email" class="form-control" name="email" required autofocus>
                              </div>
                              <div class="form-group mb-3">
                                 <label class="pl-10">Password</label>
                                 <input PLACEHOLDER="password" type="password" id="password" class="form-control" name="password" required>
                              </div>
                              <div class="form-group mb-4">
                                 <label class="pl-10">Confirm Password</label>
                                 <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" value=""/>
                              </div>
							<div class="row slct_role_main">
								<h5 class="mb-4 select_role">Select your role</h5>
								<div class="form-group col-sm-4">
									<input type="radio" id="reg_user" name="role" value="role_event">
									<label for="reg_user"> User</label>
								</div>
								<div class="form-group col-sm-4">
									<input type="radio" id="reg_driver" name="role" value="role_driver">
									<label for="reg_driver"> Driver</label>
								</div>
								<div class="form-group col-sm-4">
									<input type="radio" id="reg_admin" name="role" value="role_admin">
									<label for="reg_admin"> Admin</label>	
								</div>
							</div>
							<br/>
                              <div class="d-flex mb-3">
                                 <button type="submit" class="btn go-btn text-uppercase">Create account</button>
                              </div>
                              <!---<p class="mb-0">Don’t have an account <a href="#">Sign in</a></p>-->
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Sign_Up Modal End--> 