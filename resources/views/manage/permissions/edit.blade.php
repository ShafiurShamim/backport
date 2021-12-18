@extends('manage.layouts.manage')
@section('content')


<div class="page-nav">
    <a href="{{ route('manage.permissions.index') }}" class="btn btn-sm btn-green">
        <i class="fa fa-list-alt"></i>
        <span>Back to list</span>
    </a>
</div>


<div>
    <div class="h5 py-5">
        <i class="fa fa-user"></i>
        <span>Modify Permission</span>
    </div>

    <div class="p-2 bg-white text-gray-600">     
        <form action="{{ route('manage.permissions.update', [$table_name]) }}" method="POST" novalidate>
            @csrf

            <label class="py-4" for="table_name">Table Name: {{$table_name}}</label>
            <input type="hidden" name="table_name" value="{{$table_name}}">

            <label class="py-4" for="permissions">Permissions</label>

            @foreach($permissions_keys as $key=>$val)

                <input class="pr-2" type="checkbox" name="keys[]" value="{{$val}}" @if (in_array($val . '_' . $table_name, $permission_exits)) checked @endif> {{$val}}

            @endforeach


            <div class="py-4">
                <input name="_method" value="PUT" type="hidden">
                <input type="submit" name="submit" value="Submit" class="btn">
            </div> 
                    
                        
        </form>
    </div>
</div>
    
@endsection