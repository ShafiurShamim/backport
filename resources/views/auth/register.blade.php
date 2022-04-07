@extends('layouts.guest')

@section('content')
    
<div class="w-full max-w-xs m-auto bg-white rounded p-5 relative my-10 md:my-40">   
    <span class="absolute right-2 top-0">
        <a title="Home" href="{{route('index')}}">
            <svg class="inline" width="16" height="16" viewBox="0 0 576 512" fill="#606060">
                <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"/>
            </svg>
        </a>
    </span>

    @if ($errors->any())
    <div>
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-input w-full" required autofocus>

        <!-- Email Address -->
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-input w-full" required>
      
        <!-- Password -->
        <label for="password">Password</label>
        <input id="password" type="password" name="password" class="form-input w-full" required>

        <!-- Confirm Password -->
        <label for="password_confirmation">Password Confirmation</label>
        <input id="password_confirmation" type="password" name="password_confirmation" class="form-input w-full" required>

         
        <a class="block underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

          
         <button type="submit" class="w-full bg-gray-600 text-gray-100 rounded hover:bg-gray-500 px-4 py-2 focus:outline-none my-4 float-right">
            {{ __('Register') }}
         </button>
     
    </form>
    

   
</div>
@endsection