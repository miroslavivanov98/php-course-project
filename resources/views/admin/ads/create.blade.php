@extends('layouts.admin')

@section('content')
    <div class="container" style="width: 50%">
            
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!!Form::open(['route' => 'ads.create', 'method' => 'post'])!!}
        <div class="form-group">
            {!!Form::label('image_url','Photo')!!}
            {!!Form::text('image_url', '', ['class' => 'form-control'])!!}
        </div>
        
        <div class="form-group">
            {!!Form::label('title','Title')!!}
            {!!Form::text('title', '', ['class' => 'form-control'])!!}
        </div>
        
        <div class="form-group">
            {!!Form::label('description','Description')!!}
            {!!Form::number('description', '', ['class' => 'form-control'])!!}
        </div>
        
        <div class="form-group">
            {!!Form::submit('Submit', ['class' => 'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
    </div>
@endsection