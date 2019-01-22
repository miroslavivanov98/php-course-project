@extends('layouts.app')

@section('content')

<div class="panel">
    <div class="row">
        @foreach ($ads as $ad)
            <div class="col-sm-12 col-lg-3 card">
                <img class="card-img-top" src="{{$ad->image_url}}" alt="{{$ad->title}}">
                <div class="card-body">
                    <h5 class="card-title">{{$ad->title}}</h5>
                    <p class="card-text">{{$ad->description}}</p>
                    <a href="/ads/{{$ad->id}}/" class="btn btn-primary">View</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection