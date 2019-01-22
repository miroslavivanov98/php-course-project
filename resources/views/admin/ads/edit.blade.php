@extends('layouts.admin')

@section('content')
    <div class="container" style="width: 50%">
            <a class="btn btn-primary" href="/admin/ads/{{$ad->id}}" role="button"><i class="fas fa-arrow-left"></i> Върни се</a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!!Form::open(['url' => '/admin/ads/'.$ad->id, 'method' => 'put', 'files' => true])!!}
            <div class="form-group">
                    {!!Form::label('image','Photo')!!}<br>
                    <input data-preview="#preview" name="image" type="file" id="imageInput">
                    <img class="col-sm-6" id="preview"  src="">
                </div>
            
            <div class="form-group">
                {!!Form::label('title','Title')!!}
                {!!Form::text('title', $ad->title, ['class' => 'form-control'])!!}
            </div>

            <div class="form-group">
                    {!!Form::label('description','Descritpiton')!!}
                    {!!Form::textarea('description', $ad->description, ['class' => 'form-control'])!!}
                </div>
            
            <div class="form-group">
                {!!Form::submit('Submit', ['class' => 'btn btn-primary'])!!}
            </div>
            {!!Form::close()!!}
        </div>
@endsection