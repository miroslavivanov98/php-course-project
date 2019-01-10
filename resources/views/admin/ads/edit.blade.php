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
            {!!Form::open(['route' => ['ad.update', $ad->id], 'method' => 'put'])!!}
            <div class="form-group">
                    {!!Form::label('image','Photo')!!}<br>
                    <input data-preview="#preview" name="image" type="file" id="imageInput">
                    <img class="col-sm-6" id="preview"  src="">
                </div>
            
            <div class="form-group">
                {!!Form::label('title','Title')!!}
                {!!Form::text('title', $ad->model, ['class' => 'form-control'])!!}
            </div>

            <div class="form-group">
                    {!!Form::label('description','Descritpiton')!!}
                    {!!Form::textarea('description', $ad->model, ['class' => 'form-control'])!!}
                </div>
            
            <div class="form-group">
                {!!Form::submit('Submit', ['class' => 'btn btn-primary'])!!}
            </div>
            {!!Form::close()!!}
        </div>
@endsection