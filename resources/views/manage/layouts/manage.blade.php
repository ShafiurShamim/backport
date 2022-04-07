<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Backport') }}</title>

        <!-- Fonts -->

         <!-- Styles -->
         <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
         <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
         
         @yield('head')
    </head>
    <body>
    
        @include('manage._inc.header')

        <button id="btnSidebar" type="button" class="fixed z-50 bottom-4 right-4 w-16 h-16 rounded-full bg-gray-500 text-white block focus:outline-none lg:hidden">
            <span class="sr-only">Open site navigation</span>
            <svg width="24" height="24" fill="none" class="absolute top-1/2 left-1/2 -mt-3 -ml-3 transition duration-300 transform">
                <path d="M4 8h16M4 16h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            {{-- <svg width="24" height="24" fill="none" class="absolute top-1/2 left-1/2 -mt-3 -ml-3 transition duration-300 transform opacity-0 scale-80">
                <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg> --}}
        </button>
        
        <!-- Start Content-->
        <div id="bd__content">
            <div class="flex">
                <div id="sidebar" class="bg-gray-600 bg-opacity-60 fixed inset-0 z-40 flex-none h-full w-full lg:static lg:h-auto lg:overflow-y-visible lg:w-72 lg:block hidden">

                    <div class="scrollbar w-72 bg-gray-100 h-full text-gray-500">

                        @include('manage._inc.sidebar')

                    </div>

                </div>
                <div id="main" class="flex-1 bg-gray-200 p-4">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- End Content -->

        @include('manage._inc.messages')
        <!-- Scripts -->
        <script src="{{ asset('js/manage.js') }}"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function(){
                var btn_sidebar = document.getElementById('btnSidebar');
                var btn_sidebar_top = document.getElementById('btnSidebarTop');
                var btnSidebarClose = document.getElementById('btnSidebarClose');
                var sidebar = document.getElementById('sidebar');

                btn_sidebar.addEventListener('click', handleSidebar);

                btn_sidebar_top.addEventListener('click', handleSidebar);
                btnSidebarClose.addEventListener('click', handleSidebar);
                
                function handleSidebar(event){
                    if(sidebar.classList.contains('hidden')){
                        sidebar.classList.remove('hidden');
                      
                    } else{
                        sidebar.classList.add('hidden')
                    }
                }
            });

            document.addEventListener("DOMContentLoaded", function(){
                var fadeTarget = document.getElementsByClassName("notification");
                if(fadeTarget[0] !== undefined){
                    setTimeout(function(){
                        fadeTarget[0].remove();
                    }, 5000);
                }
            });
        </script>
        @yield('foot')
    </body>
</html>