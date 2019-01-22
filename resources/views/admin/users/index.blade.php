@extends('layouts.admin')

@section('content')
    
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Admin</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->admin ? "Admin" : "User"}}</td>
            @if ($user->admin)
                <td><a href="/admin/users/{{$user->id}}/admin/0" class="btn btn-primary">Remove Admin</a></td>
            @else
                <td><a href="/admin/users/{{$user->id}}/admin/1" class="btn btn-primary">Make Admin</a></td>    
            @endif
            
        </tr>
    @endforeach
</table>
<a class="btn btn-default" href="/admin" role="button"><i class="fas fa-arrow-left"></i> Върни се</a>
@endsection
