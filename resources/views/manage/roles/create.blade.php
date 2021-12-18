@extends('manage.layouts.manage')
@section('content')
<div>
  <a href="{{ route('manage.roles.index') }}" class="btn btn-sm btn-green">Return to List</a>
</div>
<div class="w-full">
    <span>Add Role</span>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" role="form" action="{{ route('manage.roles.store') }}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
        @csrf
      <div class=" max-w-xs">
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
              Name [Alphabets only]
          </label>
          <input class="form-input" id="name" type="text" name="name" autocomplete="off" required>
        </div>
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="display_name">
              Display Name
          </label>
          <input class="form-input" id="display_name" type="text" autocomplete="off" name="display_name">
        </div>
      </div>

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
                <input class="inline-block" type="checkbox" id="permission-{{$perm->id}}" name="permissions[]" class="the-permission" value="{{$perm->id}}">
                <label class="inline-block" for="permission-{{$perm->id}}">{{ explode("_", $perm->key)[0] }}</label>
              </li>
            @endforeach
          </ul>
        </td>
      </tr>
      @endforeach
    </table>
    <div class="py-4">
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
                      <input type="checkbox" id="permission-{{$perm->id}}" name="permissions[]" class="the-permission" value="{{$perm->id}}" >
                      <label for="permission-{{$perm->id}}">{{str_replace('_', ' ', $perm->key)}}</label>
                  </li>
              @endforeach
          </ul>
      </li>
  @endforeach
</ul> --}}