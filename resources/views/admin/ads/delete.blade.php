@extends('layouts.admin')

@section('content')
    <div class="container" style="width: 50%">
        <h3>Are you sure you want to delete ad "{{$ad->title}}"?</h3>
        {!!Form::open(['url' => '/admin/ads/'.$ad->id, 'method' => 'delete'])!!}
        <div class="form-group">
                {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!} <a href="/admin/ads/{{$ad->id}}" class="btn btn-primary">Back</a>
        </div>
        {!!Form::close()!!}
        </div>
        
@endsection