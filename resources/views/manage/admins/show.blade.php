@extends('manage.layouts.manage')
@section('content')


<div class="bg-white p-6">
    <a href="{{ route('manage.admins.index') }}" class="btn btn-sm btn-green">Return to List</a>
    <a href="{{ route('manage.admins.edit', $adminUser->id) }}" class="btn btn-sm btn-blue"></i> Edit </a>
    <form id="delete-form-{{$adminUser->id}}" class="inline" action="{{ route('manage.admins.destroy', $adminUser->id) }}" method="post"> 
        @csrf 
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-red">Delete</button>
    </form>



<div class="h5 py-5">
    <span>View Admin User Details</span>
</div>

<div>
    <ul>
        <li class="p-2">
            <span>Login:</span>
            <span class="italic font-thin">{{$adminUser->login}}</span>
        </li>
        <li class="p-2">
            <span>Email:</span>
            <span class="italic font-thin">{{$adminUser->email}}</span>
        </li>
         <li class="p-2">
            <span>Name:</span>
            <span class="italic font-thin">{{$adminUser->name}}</span>
        </li>
         <li class="p-2">
            <span>Display Name:</span>
            <span class="italic font-thin">{{$adminUser->display_name}}</span>
        </li>
    </ul>
</div>

</div>    
@endsection