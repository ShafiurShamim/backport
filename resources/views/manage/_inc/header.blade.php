        <!-- Start Header-->
        <div id="bd__header">
            <!-- Header Wrapper  fixed-->
            <header class="header bg-gray-300">
                <!-- Header Content -->
                <div class="flex">
                    <button id="btnSidebarTop" class="p-4 focus:outline-none lg:hidden">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Logo -->
                    <div class="flex-none md:w-1/4 p-4">
                       <span class="text-gray-600 font-semibold"> ADMIN P@NEL</span>
                       <a class="text-xs text-green-800" href="{{route('index')}}" target="_blank">View Site</a>
                    </div>
                    <!-- //Logo -->
                    <!-- NavBar -->
                    <div class="flex-1 flex justify-between">

                        {{-- <div id="search_box" class="p-4">Search</div> --}}
                        <div></div>
                        <div class="flex">
                           <div class="p-4 relative" x-data="{ open: false }">
                               <button class="focus:outline-none" @click="open = true">
                                   <i class="fa fa-comment"></i>
                               </button>
                               <div x-show="open" @click.away="open = false" class="md:right-0 rounded bg-white shadow-md absolute z-20 right-0 w-84 mt-1 py-2 animated faster fadeIn">
                                    <div class="p-4">Hello World!</div>
                               </div>
                           </div>
                           <div class="p-4">
                               <button class="focus:outline-none">
                                   <i class="fa fa-bell"></i>
                               </button>
                           </div>
                           <div class="dropdown p-4" x-data="{ open: false }">
                               <button class="menu-btn focus:outline-none" @click="open = true">
                                    <i class="fa fa-user"></i>
                                    <span class="hidden lg:inline-block">{{ Auth::user()->name }}</span>
                                    <i class="fa fa-chevron-down hidden lg:inline-block"></i>
                               </button>
                               
                               <div x-show="open" @click.away="open = false" class="text-gray-500 menu md:mt-1 rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-1 py-2 animated faster">
                                <!-- item -->
                                <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
                                  <i class="fa fa-edit text-xs mr-1"></i> 
                                  edit my profile
                                </a>     
                                <!-- end item -->
                                <hr>
                            
                                <!-- item -->
                                <form method="POST" action="{{ route('manage.logout') }}">
                                    @csrf
                                    <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                      <i class="fa fa-user-times text-xs mr-1"></i> 
                                        {{ __('Logout') }}
                                    </a>
                                </form>                            
                              </div>
                               
                           </div>
                        </div>
                    </div>
                    <!-- // Navbar-->
                </div>
            </header>
            <!-- // Header Wrapper -->
        </div>
        <!-- End Header -->