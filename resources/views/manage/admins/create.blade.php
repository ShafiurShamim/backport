@extends('manage.layouts.manage')
@section('content')

<div class="page-nav">
    <a href="{{ route('manage.admins.index') }}" class="btn btn-sm btn-green">
        <i class="fa fa-list-alt"></i>
        <span> All Users</span>
    </a>
</div>

<div>
    <div class="h5 py-5">
        <i class="fa fa-user"></i>
        <span>Add User</span>
    </div>

    <div class="p-2 bg-white">     
        <form action="{{ route('manage.admins.store') }}" method="POST" novalidate>
            @csrf

            <div class="p-2">
                <label  class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="p-2">
                <label  class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            </div>


            <div class="p-2">
                <label  class="block text-gray-700 text-sm font-bold mb-2" for="display_name">Display Name</label>
                <input id="display_name" type="text" name="display_name" value="{{ old('display_name') }}">
            </div>
            <div class="p-2">
                {{-- need to dev --}}
               
                <input type="checkbox" checked disabled>
                <span>Auto Generate Password</span> 
            </div>

            <div class="p-2">
                <label  class="block text-gray-700 text-sm font-bold mb-2" for="role">Role:</label>
                <select name="role" id="">
                    @foreach($roles as $key=>$val)
                        <option value="{{$key}}" @if (old('role') == $key) selected="{{$key}}" @endif>{{$val}}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2">
                <input type="submit" name="submit" value="Submit" class="btn">
            </div> 
                    
                        
        </form>
    </div>
</div>
@endsection