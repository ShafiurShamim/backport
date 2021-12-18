@extends('manage.layouts.manage')
@section('content')



<div class="py-4">
    <a class="btn btn-sm btn-green" href="{{route('manage.roles.create')}}">Add New</a>
</div>
<table>
    <tr role="row">
        <th><input type="checkbox" class="select_all"></th>
        <th>Name</th>
        <th>Display Name</th>
        <th>Actions</th>
    </tr>
    @foreach($roles as $role)
        <tr>
            <td>--</td>
            <td>{{ $role->name }}</td>
         
            <td>{{ $role->display_name }}</td>
            <td>
                    <a class="py-0.5 px-2 text-green-500 hover:text-green-800" href="{{ route('manage.roles.show', $role->id) }}" title="View">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="py-0.5 px-2 text-yellow-500 hover:text-yellow-800" href="{{ route('manage.roles.edit', $role->id) }}" title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <form id="delete-form-{{$role->id}}" class="inline" action="{{ route('manage.roles.destroy', $role->id) }}" method="post"> 
                        @csrf 
                        @method('DELETE')
                        <button class="py-0.5 px-2 text-red-500 hover:text-red-800" type="submit" title="Delete"><i class="fas fa-trash-alt"></i></button>
                    </form>
            </td>
        </tr>
    @endforeach

   
</table>

    
@endsection