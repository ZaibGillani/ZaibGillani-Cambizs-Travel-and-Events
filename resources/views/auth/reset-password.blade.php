<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  
  @include('includes.head') 
	<body>
		<style>
			.login_form_custom .cotainer{
				padding-top:30px;
				padding-bottom:30px;
			}
			.login_form_custom .card{
				border:none;
			}
			.login_form_custom .d-flex .btn {
				flex-basis: 47%;
			}
		</style>
		@include('includes.header')
		<main class="main-content login_form_custom">
			<!--== Start Banner Area Wrapper ==-->
            <section class="inner-pages-banner">
               <img
				  class="banner-image"
                  src="{{ url('/img/events/banner.jpg')}}"
                  alt="home-banner"
                  />
               <div
                  class="home-slider-sidebar d-none d-xl-block"
                  data-aos="fade-zoom-in"
                  data-aos-duration="1300"
                  >
               </div>
               <div class="content text-center">
                  <div
                     class="tittle-wrp mb-4"
                     data-aos="fade-down"
                     data-aos-duration="1000"
                     >
                     <h2>Reset Password</h2>
                  </div>
               </div>

            </section>
		  <div class="container">
			  <div class="row justify-content-center">
				  <div class="col-md-8">
					  <div class="card">
						  <div class="card-body radius-10 bg-light-primary">
		  
							<form id="reset-password" action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <!-- hidden fields -->
                                <input type="hidden" name="token" value="{{ $token }}">
                                <input type="hidden" name="email" value="{{ $email }}">
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required  style="background-color:#FEC225;">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6" >
                                        <input type="password" id="password"     class="form-control" name="password_confirmation" required style="background-color:#FEC225;"  >
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
		  
                                <div class="col-md-6 d-flex mb-3 offset-md-4">
                                    <button type="submit" class="btn go-btn">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
								
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
		</main>
		@include('includes.footer')
	</body>
</html>