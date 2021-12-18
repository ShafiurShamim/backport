@extends('manage.layouts.manage')
@section('content')

<table>
    <tr role="row">
        <th><input type="checkbox" class="select_all"></th>
        <th>Name</th>
        <th>Email</th>
        <th>Reg. Date</th>
        <th>Status</th>
    </tr>
    @foreach($manageUsers as $user)
        <tr>
            <td>--</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>@if ($user->email_verified_at)
                <span class="text-green-600">Verified</span>
            @endif</td>
        </tr>
    @endforeach
</table>
    
@endsection