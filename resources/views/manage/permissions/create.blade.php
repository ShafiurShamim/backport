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
        <span>Add Permission</span>
    </div>

    <div class="p-2 bg-white">     
        <form action="{{ route('manage.permissions.store') }}" method="POST" novalidate>
            @csrf



            <div class="p-2">
                <input type="submit" name="submit" value="Submit" class="btn">
            </div> 
                    
                        
        </form>
    </div>
</div>
    
@endsection