@extends('layouts.guest')

@section('content')
    
<div class="w-full max-w-xs m-auto bg-white rounded p-5 my-10 md:my-40">   
    
    @if ($errors->any())
    <div>
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>

            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus />
        </div>


        <!-- Password -->
        <label for="password">Password</label>
        <input class="block mt-1 w-full" id="password" type="password" name="password" required>

        <!-- Confirm Password -->
        <label for="password_confirmation">Password Confirmation</label>
        <input class="block mt-1 w-full" id="password_confirmation" type="password" name="password_confirmation" required>

         
      
          
         <button type="submit" class="w-full bg-gray-600 text-gray-100 rounded hover:bg-gray-500 px-4 py-2 focus:outline-none my-4 float-right">
            {{ __('Reset Password') }}
         </button>
     
    </form>
    

   
</div>
@endsection