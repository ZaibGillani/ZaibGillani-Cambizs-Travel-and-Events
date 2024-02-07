<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
  @include('includes.head')

   
   <body>
		@include('includes.header')
         <main class="main-content">
            <!--== Start Banner Area Wrapper ==-->
            <section class="home-banner">
               <img src="{{ url('/img/banner/banner.jpg') }}" alt="home-banner" class="d-none d-sm-block banner-image">
               <div class="home-slider-sidebar d-none d-xl-block" data-aos="fade-zoom-in" data-aos-duration="1300">
                  <div class="social-icon text-center">
                     <span>Follow Us</span><br/><br/>
                     <hr/>
                     <br/>
                     <a href="#/"><i class="icofont-facebook"></i></a><br/>
                     <a href="#/"><i class="icofont-twitter"></i></a><br/>
                     <a href="#/"><i class="icofont-instagram"></i></a><br/>
                     <a href="#/"><i class="icofont-linkedin"></i></a>
                  </div>
               </div>
               <div class="slogan-block d-none d-xl-block"  data-aos="fade-zoom-in" data-aos-duration="1300">
                  <h6><span>DISCOVER</span> THE WORLD YOU HAVE NEVER SEEN</h6>
               </div>
               <div class="content text-center">
                  <div class="subtitle-content mb-4" data-aos="fade-left" data-aos-duration="1000">
                     <h6>Let’s make the best trip ever</h6>
                  </div>
                  <div class="tittle-wrp mb-4"  data-aos="fade-down" data-aos-duration="1000">
                     <h2>A new <span>pulse</span> of dream</h2>
                  </div>
                  <div class="mb-5 subtitle-content-2">
                     <span data-aos="fade-right" data-aos-duration="1200"></span>
                     <p class="m-0 px-4" data-aos="fade-up" data-aos-duration="1000">Explore beautiful places</p>
                     <span data-aos="fade-left" data-aos-duration="1200"></span>
                  </div>
                  <a href="services.html"  class="btn btn-theme">Go Explore Now <i class="icon icofont-long-arrow-right"></i></a>
               </div>
               <div class="layer-style d-none d-xl-block">
                  <div class="shape-style1"></div>
                  <div class="shape-style2"></div>
                  <div class="shape-style3"></div>
                  <div class="shape-style4"></div>
                  <div class="line-style1"></div>
                  <div class="line-style2"></div>
                  <div class="line-style3"></div>
                  <div class="line-style4"></div>
               </div>
            </section>
            <!--== End Banner Area Wrapper ==-->
            <!--== Start Travel& Event Area Wrapper ==-->
            <section class="first-section" data-aos="fade-up" data-aos-duration="1000">
               <div class="container">
                  <ul class="nav nav-pills justify-content-center parent-tab" id="pills-tab" role="tablist">
                     <li class="nav-item" role="presentation">
                        <button class="nav-link active " id="travel" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Travel</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link" id="events" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Events</button>
                     </li>
					 <li class="nav-item" role="presentation">
                        <button class="nav-link" id="car-booking" data-bs-toggle="pill" data-bs-target="#pills-carbooking" type="button" role="tab" aria-controls="pills-carbooking" aria-selected="false">Car booking</button>
                     </li>
                  </ul>
                  <div class="tab-content p-4" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="travel">
                        <ul class="nav nav-pills mb-3 child-tab justify-content-center align-items-center" id="pills-tab" role="tablist">
                           <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="travel-flight" data-bs-toggle="pill" data-bs-target="#pills-flight" type="button" role="tab" aria-controls="pills-flight" aria-selected="true"><img src="{{ url('/img/icons/flight.png') }}" alt=""><span>Flight</span></button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="travel-bus" data-bs-toggle="pill" data-bs-target="#pills-bus" type="button" role="tab" aria-controls="pills-bus" aria-selected="false"><img src="/img/icons/bus.png" alt=""><span>Bus</span></button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="travel-cruise" data-bs-toggle="pill" data-bs-target="#pills-cruise" type="button" role="tab" aria-controls="pills-cruise" aria-selected="false"><img src="{{ url('/img/icons/cruise.png') }}" alt=""><span>Cruise</span></button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="travel-train" data-bs-toggle="pill" data-bs-target="#pills-train" type="button" role="tab" aria-controls="pills-train" aria-selected="false"><img src="{{ url('/img/icons/train.png') }}" alt=""><span>Train</span></button>
                           </li>
                        </ul>
                        <div class="tab-content child-pane" id="pills-tabContent">
                           <div class="tab-pane fade show active p-4" id="pills-flight" role="tabpanel" aria-labelledby="travel-flight">
                              <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
                                 </li>
                              </ul>
                              <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
                                 <form>
                                    <div class="row custom-input-style">
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">From</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2 pr-0">
                                          <label class="pl-10">To</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="Canada (CA)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2">
                                          <label class="pl-10">Depart</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-calendar"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3 pl-0">
                                          <label class="pl-10">Cabin Class & Travells</label>
                                          <div class="custom-select-form">
                                             <select class="wide">
                                                <option value="" selected>1 Adult, Economy</option>
                                                <option value="">2 Adult, Economy</option>
                                                <option value=" ">3 Adult, Economy</option>
                                                <option value=" ">4 Adult, Economy</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
                                    </div>
                                    <div class="mt-5 justify-content-center check-block">
                                       <label class="check-custom-style">Add nearby airports
                                       <input type="checkbox">
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="check-custom-style">Direct flights only
                                       <input type="checkbox">
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="check-custom-style">Flexible tickets only
                                       <input type="checkbox">
                                       <span class="checkmark"></span>
                                       </label>
                                       <label class="check-custom-style">Add nearby airports
                                       <input type="checkbox" checked="checked">
                                       <span class="checkmark"></span>
                                       </label>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane fade p-4" id="pills-bus" role="tabpanel" aria-labelledby="travel-bus">
                              <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
                                 </li>
                              </ul>
                              <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
                                 <form>
                                    <div class="row custom-input-style">
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">From</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">To</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2">
                                          <label class="pl-10">Depart</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-calendar"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2 pl-0">
                                          <label class="pl-10">Pessenger</label>
                                          <div class="custom-select-form">
                                             <select class="wide">
                                                <option value="" selected>1</option>
                                                <option value="">2</option>
                                                <option value=" ">3</option>
                                                <option value=" ">4</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane fade p-4" id="pills-cruise" role="tabpanel" aria-labelledby="travel-cruise">
                              <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
                                 </li>
                              </ul>
                              <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
                                 <form>
                                    <div class="row custom-input-style">
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">From</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-4 pr-0">
                                          <label class="pl-10">To</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <label class="pl-10">Depart</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-calendar"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                           <div class="tab-pane fade p-4" id="pills-train" role="tabpanel" aria-labelledby="travel-train">
                              <ul class="nav nav-pills mb-3 child-tab-2 justify-content-center align-items-center" id="pills-tab" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-return-tab" data-bs-toggle="pill" data-bs-target="#pills-return" type="button" role="tab" aria-controls="pills-return" aria-selected="true">Return</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-one-way-tab" data-bs-toggle="pill" data-bs-target="#pills-one-way" type="button" role="tab" aria-controls="pills-one-way" aria-selected="false">One Way</button>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-multi-city-tab" data-bs-toggle="pill" data-bs-target="#pills-multi-city" type="button" role="tab" aria-controls="pills-multi-city" aria-selected="false">Multi-city</button>
                                 </li>
                              </ul>
                              <div class="tab-pane fade show active p-4" id="pills-return-tab" role="tabpanel" aria-labelledby="pills-return-tab-tab">
                                 <form>
                                    <div class="row custom-input-style">
                                       <div class="col-sm-12 col-md-3 pr-0">
                                          <label class="pl-10">From</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="United States (US)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-4 pr-0">
                                          <label class="pl-10">To</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="4014 Asylum Avenue (Serena)" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-search-1"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-3">
                                          <label class="pl-10">Depart</label>
                                          <div class="input-group input-group-merge">
                                             <input type="text" value="04/ 03/ 2021" class="form-control form-control-prepended"/>
                                             <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                   <span class="icofont-calendar"></span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 col-md-2"><a href="" class="btn mt-25">Search<i class="icofont-search-1 position-relative ml-25"></i></a></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="events">
                        @include('home_event')
                     </div>
                     @include('car_event')
                  </div>
               </div>
            </section>
            <!--== End Travel& Event Area Wrapper ==-->
            <!--== Start Second Section Area Wrapper ==-->
            <section class="second-section">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-md-5">
                        <div class="explore-content mb-5" data-aos="fade-up" data-aos-duration="800">
                           <h6>BE BORN AGAIN</h6>
                           <h2 class="mb-4">We are explore</h2>
                           <p class="mb-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  here, content here', making it
                              look like readable English.
                           </p>
                           <a href="#" class="btn btn-link">READ MORE</a>
                        </div>
                     </div>
                     <div class="col-md-7">
                        <div class="row">
                           <div class="col-md-6" data-aos="fade-up" data-aos-duration="1200">
                              <figure><img src="{{ url('/img/home-photos/img01.jpg')}}" class="rounded"></figure>
                           </div>
                           <div class="col-md-6" data-aos="fade-up" data-aos-duration="1600">
                              <figure class="mt-5"><img src="{{ url('/img/home-photos/img02.jpg')}}" class="rounded"></figure>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="layer-style">
                     <div class="shape-style1"></div>
                     <div class="shape-style2"></div>
                     <h2 data-aos="fade-zoom-in" data-aos-duration="1000">Explore</h2>
                  </div>
               </div>
            </section>
            <!--== End Second Section Area Wrapper ==-->
            <!--== Start Feature Event Area ==-->
            @include('featured_event')
            <!--== End Feature Event Area ==-->
            <!--== Start About-Us Area ==-->
            <section class="about-us-area">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12 col-xl-12">
                        <div class="testimonial-content">
                           <div class="testimonial-slider-content">
                              <div class="layer-style">
                                 <div class="shape-style1"></div>
                                 <div class="shape-style2"></div>
                                 <h2 data-aos="fade-zoom-in" data-aos-duration="1000">About us</h2>
                              </div>
                              <div class="swiper-container testimonial-slider-container"  data-aos="fade-up" data-aos-duration="1000">
                                 <div class="swiper-wrapper testimonial-slider">
                                    <div class="swiper-slide testimonial-single">
                                       <div class="icon-box"><img src="{{ url('/img/about/about-img.jpg')}}" alt=""></div>
                                       <div class="client-content">
                                          <h5>BE BORN AGAIN</h5>
                                          <h2 class="mb-3 title">About us</h2>
                                          <p class="mb-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  here, content here', making it
                                             look like readable English.
                                          </p>
                                          <a href="#" class="btn btn-link">READ MORE</a>
                                       </div>
                                    </div>
                                    <div class="swiper-slide testimonial-single">
                                       <div class="icon-box"><img src="{{ url('/img/about/about-img.jpg')}}" alt=""></div>
                                       <div class="client-content">
                                          <h5>BE BORN AGAIN</h5>
                                          <h2 class="mb-3 title">About us</h2>
                                          <p class="mb-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  here, content here', making it
                                             look like readable English.
                                          </p>
                                          <a href="#" class="btn btn-link">READ MORE</a>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Next Previous Button Start -->
                                 <div class="move-slide-arrow">
                                    <div class="feature-event-list-next swiper-button-next"><i class="icofont-long-arrow-right"></i></div>
                                    <div class="feature-event-list-prev swiper-button-prev"><i class="icofont-long-arrow-left"></i></div>
                                 </div>
                                 <!-- Next Previous Button End -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!--== End About-Us Area ==-->
            <!--== Start Hapy Traveler Area ==-->
            <section class="hapy-traveler-area">
               <div class="container">
                  <div class="row align-items-center" data-aos="fade-up" data-aos-duration="1000">
                     <div class="col-sm-12">
                        <div class="section-title text-center mb-5 pb-4">
                           <div class="subtitle-content xs-d-i-flex">
                              <h5 class="text-uppercase">Relax and enjoy</h5>
                           </div>
                           <h2 class="title">Hapy Traveler</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 col-xl-12">
                        <div class="testimonial-content md-pl-0 pl-lg-30 pl-70" data-aos="fade-up" data-aos-duration="1300">
                           <div class="testimonial-slider-content">
                              <div class="layer-style">
                                 <div class="shape-style1"></div>
                                 <div class="shape-style2"></div>
                                 <div class="shape-style3"></div>
                                 <div class="shape-style4"></div>
                                 <h2 data-aos="fade-zoom-in" data-aos-duration="1000" class="aos-init">Tours</h2>
                              </div>
                              <div class="swiper-container testimonial-slider-container">
                                 <div class="swiper-wrapper testimonial-slider">
                                    <div class="swiper-slide testimonial-single">
                                       <div class="client-content">
                                          <h3 class="mb-4 pt-5">We had a tremendous pleasure</h3>
                                          <p class="mb-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  here, content here', making it
                                             look like readable English.
                                          </p>
                                          <h5>Natali Bocouse</h5>
                                          <h6>Trip to Maldives</h6>
                                       </div>
                                       <div class="icon-box"><img src="{{ url('/img/testimonial/img01.jpg')}}" alt=""></div>
                                    </div>
                                    <div class="swiper-slide testimonial-single">
                                       <div class="client-content">
                                          <h3 class="mb-4 pt-5">We had a tremendous pleasure</h3>
                                          <p class="mb-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using  here, content here', making it
                                             look like readable English.
                                          </p>
                                          <h5>Natali Bocouse</h5>
                                          <h6>Trip to Maldives</h6>
                                       </div>
                                       <div class="icon-box"><img src="{{ url('/img/testimonial/img01.jpg')}}" alt=""></div>
                                    </div>
                                 </div>
                                 <!-- Next Previous Button Start -->
                                 <div class="move-slide-arrow pt-5 mt-4 text-center">
                                    <div class="feature-event-list-next swiper-button-next"><i class="icofont-long-arrow-right"></i></div>
                                    <div class="feature-event-list-prev swiper-button-prev"><i class="icofont-long-arrow-left"></i></div>
                                 </div>
                                 <!-- Next Previous Button End -->
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!--== End Hapy Traveler Area ==-->
            <!--== Start Contact Area ==-->
            <section class="contact-section">
               <div class="container">
                  <div class="layer-style">
                     <h2 data-aos="fade-zoom-in" data-aos-duration="1000" class="aos-init">Cambizs</h2>
                  </div>
                  <div class="contact-block" data-aos="fade-up" data-aos-duration="1000">
                     <div class="contact-form">
                        <form class="contact-form-wrapper" id="contact-form" data-aos="fade-up" data-aos-duration="1300">
                           <div class="row">
                              <div class="col-lg-12 mb-4">
                                 <div class="section-title">
                                    <div class="subtitle-content">
                                       <h5>Get in touch</h5>
                                    </div>
                                    <h2 class="title">Contact Us</h2>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="row row-gutter-20">
                                    <div class="col-md-12 mb-4">
                                       <label>Name</label>
                                       <div class="form-group">
                                          <input class="form-control" type="text" name="con_name" placeholder="Name">
                                       </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                       <label>Email</label>
                                       <div class="form-group">
                                          <input class="form-control" type="email" name="con_email" placeholder="Email">
                                       </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                       <label>Message</label>
                                       <div class="form-group mb-0">
                                          <textarea name="con_message" placeholder="Type here...."></textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group mb-0">
                                          <button class="btn btn-theme" type="submit">SEND<i class="icofont-long-arrow-right"></i></button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </section>
            <!--== End Contact Area ==-->
         </main>
         
		 @include('includes.footer')
	  
   </body>
</html>