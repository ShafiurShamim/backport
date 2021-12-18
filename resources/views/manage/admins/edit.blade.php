@extends('manage.layouts.manage')
@section('content')

<div class="page-nav">
    <a href="{{ route('manage.admins.index') }}" class="btn btn-sm btn-green">
        <i class="fa fa-list-alt"></i>
        <span> All Users</span>
    </a>
</div>

<div class="page-body">
    <div class="h5 py-5">
        <i class="fa fa-user"></i>
        <span>Edit User</span>
    </div>

    <div class="p-2 bg-white">
       
            <div><b>Name: </b><span>{{ $adminUser->name }}</span></div>
            <div><b>Email: </b><span>{{ $adminUser->email }}</span></div>
            
            <form action="{{ route('manage.admins.update', $adminUser->id) }}" method="POST" novalidate>
                @csrf

                        <div class="p-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2" for="display_name">Display Name</label>
                            <input id="display_name" type="text" name="display_name" value="{{ old('display_name', $adminUser->display_name) }}">
                            @if ($errors->has('display_name'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('display_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="p-2">
                            <label  class="block text-gray-700 text-sm font-bold mb-2" for="new_password">New Password</label>
                            <input id="new_password" type="text" name="new_password" placeholder="Leave empty to keep the same">
                            {{-- @if ($errors->has('new_password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                            @endif --}}
                        </div>
                        <div class="p-2"> 
                            <label  class="block text-gray-700 text-sm font-bold mb-2" for="roles">Roles:</label>
                            <select class="select-two" id="roles" name="roles">
                                @if($adminUser->roles()->pluck('id')->first() == null)
                                    <option value="" selected>--None--</option>
                                @endif
                                @foreach($roles as $rk => $rv)
                                        <option value="{{$rk}}" @if($rk == $adminUser->roles()->pluck('id')->first()) selected @endif>{{$rv}}</option>
                                @endforeach
                            </select>
                        </div> 
                    
                        <div class="p-2">
                            <input name="_method" value="PUT" type="hidden">
                            <input type="submit" name="submit" value="Submit" class="btn">
                        </div> 
                        
                            
            </form>
    </div>
</div>
@endsection