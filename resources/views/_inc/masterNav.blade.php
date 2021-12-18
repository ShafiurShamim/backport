<nav class="bg-gray-800 border-b border-gray-100">

     <!-- NavBar -->
     <div class="flex-1 flex justify-between">
        <div class="m-1.5">
            <a class="text-gray-200 p-4 text-2xl" href="{{route('manage.login')}}">Backport</a>
        </div>
        <div class="flex-1 flex justify-end px-6">
                @if (Route::has('login'))
                
                    @auth

                        <div class="p-2 text-sm text-gray-100">
                           <a href="{{route('dashboard')}}">{{ Auth::user()->name }}</a>
                        </div>
            
                        <div class="p-2 text-sm text-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </div>        
                            
                    @else
                        <a href="{{ route('login') }}" class="p-2 text-sm text-gray-200">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="p-2 text-sm text-gray-200">Register</a>
                        @endif
                    @endauth
                @endif
        </div>
    </div>

<!-- // Navbar-->
</nav>