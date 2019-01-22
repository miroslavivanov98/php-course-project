@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{$ad->title}}</h3>
        <p>Posted by {{$ad->user->name}} on {{date('d/m/Y h:i A', strtotime($ad->created_at))}}
            @if ($ad->created_at != $ad->updated_at)
                <span style="font-size: 0.9em; color: #222;">Last updated at {{date('d/m/Y h:i A', strtotime($ad->updated_at))}}</span>
            @endif
        </p>
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <img src="{{$ad->image_url}}" alt="{{$ad->title}}" style="width: 100%; max-width: 300px">
            </div>
            <div class="col sm-12 col-lg-9">
                <p>{{$ad->description}}</p>
                @if (Auth::check() && Auth::user()->id == $ad->user->id)
                    {{--Potrebitelq e sobstvenik na obqvata--}}
                    <a href="/ads/{{$ad->id}}/edit" class="btn btn-warning">Edit</a>
                @endif
            </div>
        </div>

    </div>
@endsection