@extends('manage.layouts.manage')
@section('content')


<div class="bg-white p-6">
    <a href="{{ route('manage.roles.index') }}" class="btn btn-sm btn-green">Return to List</a>
    <a href="{{ route('manage.roles.edit', $role->id) }}" class="btn btn-sm btn-blue"></i> Edit </a>
    <form id="delete-form-{{$role->id}}" class="inline" action="{{ route('manage.roles.destroy', $role->id) }}" method="post"> 
        @csrf 
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-red">Delete</button>
    </form>
</div>


<div class="h5 py-5">
    <span>View Role Details</span>
</div>
<div class="bg-white p-4">
    
    <div><b>Name: </b>{{$role->name}}</div>
    <div><b>Display Name: </b>{{$role->display_name}}</div>


    <h3 class="my-4">Permissions</h3>

    @if ($role->name !== 'super')
        <table>
            <tr role="row">
                <th>Table Name</th>
                <th>Permission keys</th>
            </tr>
            @foreach($permissions as $table => $permission)
                
            <tr>
                <td>{{ $table }}</td>
                <td>
                    <ul>
                        @foreach($permission as $perm)
                            <li class="inline-block">
                                <span>
                                    @if(in_array($perm->key, $role->permissionKeys()))
                                        <i class="fa fa-check-square-o text-green-800"></i>
                                    @else
                                        <i class="fa fa-square-o"></i>
                                    @endif
                                </span> {{ explode("_", $perm->key)[0] }}
                            </li>
                        @endforeach
                    </ul>
                </td>    
            </tr>
            @endforeach
        </table>   
    @else
        <h4>Super role does not need access privileges.</h4>
    @endif
   
</div>


@endsection

{{-- <ul class="permissions checkbox">
    @foreach($permissions as $table => $permission)
        <li>
            <label><strong>{{str_replace('_',' ', $table)}}</strong></label>
            <ul>
            
                @foreach($permission as $perm)
                    <li>
                        @if(in_array($perm->key, $role->permissionKeys()))
                        <span class="text-green">&#9745;</span>
                        @else
                        <span class="text-red">&#9744;</span>
                        @endif
                        <label for="permission-{{$perm->id}}">{{str_replace('_', ' ', $perm->key)}}</label>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul> --}}