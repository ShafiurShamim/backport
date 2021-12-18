<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CMSBD') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('head')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <div id="masterNav">
                @include('_inc.masterNav')
            </div>

            <div id="nav"  class="bg-gray-200">
                @include('_inc.navigation')
            </div>

            <!-- Page Heading -->
            <header>
                <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>

            <!-- Page Footer -->
            <footer class="">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @include('_inc.footer')
                </div>
            </footer>
        </div>
        @yield('foot')
       
        @include('_inc.messages')

        <script>
	    document.addEventListener("DOMContentLoaded", function(){
		var fadeTarget = document.getElementById("notification");
		if(fadeTarget !== null){
		    setTimeout(function(){
		        fadeTarget.remove();
		    }, 5000);
		}
	    });
        </script>
    </body>
</html>
