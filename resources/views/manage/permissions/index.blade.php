@extends('manage.layouts.manage')
@section('content')

<table>
    <tr role="row">
        <th>Table Name</th>
        <th>Permission keys</th>
        <th>Actions</th>
    </tr>
    @foreach($tables as $table)
           
        <tr>
            <td>{{ $table->getName() }}</td>
            <td>
                <ul>
                    @foreach($permissions_keys as $key=>$val)
                        <li class="inline-block">
                            <span>
                                @if (in_array($val . '_' . $table->getName(), $permission_exits)) 
                                    <i class="far fa-check-square text-green-800"></i>
                                @else
                                    <i class="far fa-square"></i>
                                @endif
                            </span> {{$val}}
                        </li>
                        {{-- <input type="checkbox" value="{{$key}}" > {{$val . '_' . $table->getName()}} --}}
                    @endforeach
                </ul>
               <td>
                    <a class="btn btn-sm btn-indigo" href="{{ route('manage.permissions.edit', $table->getName()) }}">Modify</a>
               </td>
                  
               
            </td>
        </tr>
    @endforeach

   
</table>

    
@endsection