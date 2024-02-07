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
                        @if (Auth::check())
								<li class="user_dashboard"><a href="{{ url('/dashboard/') }}">Dashboard</a></li>
								@endif
								
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
                        <a href="<?php echo url('/'); ?>">
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
                        <a href="<?php echo url('/'); ; ?>">
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
                           <div class="login_form_wrapper">
                              <h3 class="mb-4 login">Login</h3>
                              <div class="text-danger"></div>
                              <div class="text-success"></div>
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
                                 <!-- Forgot password link -->
                                 <div class="d-flex justify-content-end mb-3">
                                    <a href="#" onclick="forgotPassword()" class="forgot-password" style="color:#fec225">Forgot your Password?</a>
                                 </div>
                                 <div class="d-flex mb-3">
                                    <button type="submit" class="btn go-btn">Login</button>
                                 </div>
                                 <p class="mb-0"  onclick="openAuthModal('signup')">Don’t have an accountsss <a href="#" style="color:#fec225" >Sign up</a></p>
                              </form>
                           </div>
                           <!-- Forgot Password Form Wrapper -->
                           <div class="forgot-password-form-wrapper">
                              <h3 class="mb-4 login">Forgot Password</h3>
                              <div class="text-danger"></div>
                              <div class="text-success"></div>
                              <form id="forgot_pwd_frm" method="POST" action="{{ route('password.email') }}">
                                 @csrf
                                 <div class="form-group mb-3">
                                    <label class="pl-10">Email</label>
                                    <input id="email" type="email" name="email" class="form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="" placeholder="Email"/>
                                 </div>
                                 <div class="d-flex mb-3">
                                    <button type="submit" class="btn go-btn">Go</button>
                                 </div>
                                 <div class="d-flex justify-content-end mb-3">
                                    <a href="#" onclick="backToLogin()" class="forgot-password" style="color:#fec225">Back to Login</a>
                                 </div>
                              </form>
                           </div>
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
								
								  <div class="text-danger"></div>
								  <div class="text-success"></div>
								
                              <div class="form-group mb-3">
                                 <label class="pl-10 nm_top">Name</label>
                                
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