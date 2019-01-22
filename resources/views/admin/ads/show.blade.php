@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="font-weight: bold; text-align: right">Photo</div>
            <div class="col-md-8"><img src="{{$ad->image_url}}" alt="{{$ad->title}}" width=500px></div>
        </div>
        <div class="row">
            <div class="col-md-4" style="font-weight: bold; text-align: right">Title</div>
            <div class="col-md-8">{{$ad->title}}</div>
        </div>
        <div class="row">
            <div class="col-md-4" style="font-weight: bold; text-align: right">Description</div>
            <div class="col-md-8">{{$ad->description}}</div>
        </div>
        <div class="panel">
            <a href="/admin/ads/{{$ad->id}}/edit" class="btn btn-warning">Edit</a>
            <a href="/admin/ads/{{$ad->id}}/delete" class="btn btn-danger">Delete</a>
            @if($ad->pending)
                <a href="/admin/ads/{{$ad->id}}/approve" class="btn btn-primary">Approve</a>
            @endif
        </div>
        <a class="btn btn-primary" href="/admin" role="button"><i class="fas fa-arrow-left"></i> Върни се</a>
    </div>
@endsection