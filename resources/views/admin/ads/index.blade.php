@extends('layouts.admin')

@section('content')
    <table class="table table-striped">
        <thead>
            <td>Id</td>
            <td>Title</td>
            <td>Description</td>
            <td>Approved</td> <!--Одобрена-->

        </thead>
        <tbody>
            @foreach ($obqva as $ad)
                <tr>
                    <td>{{$ad->id}}</td>
                    <td>{{$ad->title}}</td>
                    <td>{{$ad->description}}</td>
                    <td>{{$ad->pending ? 'false' : 'true'}}</td> 
                    <td>
                        <a href="/admin/ads/{{$ad->id}}" class="btn btn-primary">Show</a>
                        <a href="/admin/ads/{{$ad->id}}/edit" class="btn btn-warning">Edit</a>
                        <a href="/admin/ads/{{$ad->id}}/delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection