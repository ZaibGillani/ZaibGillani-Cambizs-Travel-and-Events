<header>
            <div class="topbar d-flex align-items-center">
               <nav class="navbar navbar-expand">
                  <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                  </div>
                  <div class="top-menu">
                     <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown dropdown-large d-none">
                           <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                           <i class='bx bx-bell'></i>
                           </a>
                           <div class="dropdown-menu dropdown-menu-end">
                              <div class="header-notifications-list">
                              </div>
                           </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large d-none">
                           <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                           <i class='bx bx-comment'></i>
                           </a>
                           <div class="dropdown-menu dropdown-menu-end">
                              <div class="header-message-list">
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <div class="user-box dropdown  ms-auto">
					@if(auth()->user()->name)
                     <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ url('/images/event_user/avatars/avatar-1.jpg') }}" class="user-img" alt="user avatar 43453">
                        <div class="user-info ps-3">
                          
							
							<p class="user-name mb-0">{{auth()->user()->name}}</p>
							
                        </div>
						<div class="ps-1">
                           <i class="bx bx-chevron-down label-text"></i>
                        </div>
                     </a>
					 @endIf
                     <ul class="dropdown-menu dropdown-menu-end">
                        @if (Auth::check())
							<li>
								<a class="dropdown-item" href="dashboard/setting/{{Auth::user()->id}}"><i class="bx bx-cog text-orange"></i>
									<span>Setting</span>
								</a>
							</li>
						@endif
                        <li><a class="dropdown-item logout-btn" href="{{route('logout')}}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>