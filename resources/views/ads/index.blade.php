@extends('layouts.app')

@section('content')

@if ($own)
    <a href="/ads" class="btn btn-primary">Всички обяви</a>
@else
    <a href="/ads?own=1" class="btn btn-warning">Твои обяви</a>
@endif
<a class="btn btn-primary" href="/ads/create" role="button"><i class="fas fa-plus"></i> Създаване</a>
<div class="panel">
    <div class="row">
        @foreach ($ads as $ad)
            <div class="col-sm-12 col-lg-3 card">
                <img class="card-img-top" style="height: 250px;" src="{{$ad->image_url}}" alt="{{$ad->title}}">
                <div class="card-body">
                    <h5 class="card-title">{{$ad->title}}</h5>
                    <p class="card-text">{{$ad->description}}</p>
                    <a href="/ads/{{$ad->id}}/" class="btn btn-primary">View</a>
                </div>
            </div>
        @endforeach
        {{$ads->links()}}
    </div>
</div>

@endsection