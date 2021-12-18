@extends('manage.layouts.manage')
@section('content')
<div>
  <a href="{{ route('manage.roles.index') }}" class="btn btn-sm btn-green">Return to List</a>
  <form id="delete-form-{{$role->id}}" class="inline" action="{{ route('manage.roles.destroy', $role->id) }}" method="post"> 
      @csrf 
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-red">Delete</button>
  </form>
</div>
<div class="w-full">
  <div class="h5 py-5">
      <span>Edit Role</span>
  </div>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" role="form" action="{{ route('manage.roles.update', ['role'=>$role->id]) }}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
        @csrf
      <div class=" max-w-xs">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
              Name [Alphabets only]
          </label>
          <input class="form-input" id="name" type="text" name="name" autocomplete="off" value="{{old('name', $role->name)}}" required>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="display_name">
              Display Name
          </label>
          <input class="form-input" id="display_name" type="text" autocomplete="off" name="display_name" value="{{old('display_name', $role->display_name)}}">
        </div>
      </div>
      
      @if ($role->name !== 'super')
        <h3>{{ __('permissions') }}</h3>
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
                    <input class="inline-block" type="checkbox" id="permission-{{$perm->id}}" name="permissions[]" class="the-permission" value="{{$perm->id}}" @if (in_array($perm->key, $role->permissionKeys()))
                    checked
                    @endif >
                    <label class="inline-block" for="permission-{{$perm->id}}">{{ explode("_", $perm->key)[0] }}</label>
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
        <div class="py-4">
          <input name="_method" value="PUT" type="hidden">
          <input type="submit" name="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
  </div>
  
@endsection

{{-- <ul class="permissions checkbox">
        @foreach($permissions as $table => $permission)
            <li>
                <input type="checkbox" id="{{$table}}" class="permission-group">
                <label for="{{$table}}"><strong>{{str_replace('_',' ', $table)}}</strong></label>
                <ul>
                    @foreach($permission as $perm)
                        <li>
                            <input type="checkbox" id="permission-{{$perm->id}}" name="permissions[]" class="the-permission" value="{{$perm->id}}" @if (in_array($perm->key, $role->permissionKeys()))
                                checked
                            @endif >
                            <label for="permission-{{$perm->id}}">{{str_replace('_', ' ', $perm->key)}}</label>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul> --}}
