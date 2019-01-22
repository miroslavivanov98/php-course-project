@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{$ad->title}}</h3>
        <p>Posted by {{$ad->user->name}} on {{date('d/m/Y h:i A', strtotime($ad->created_at))}}
            @if ($ad->created_at != $ad->updated_at)
                <span style="font-size: 0.9em; color: #222;">Last updated at {{date('d/m/Y h:i A', strtotime($ad->updated_at))}}</span>
            @endif
        </p>
        <hr>
        
    </div>
@endsection