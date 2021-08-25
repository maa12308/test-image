@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
        <ul class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <li class="ml-4">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group row justify-content-center">
        <div class="col-auto">
            {!! Form::model($item, ['route' => 'items.store', 'method' => 'post', 'files' => 'true']) !!}
            
                <div class="form-group">
                    {!! Form::label('bland', '銘柄') !!}
                    {!! Form::text('bland', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">    
                    {!! Form::label('type', '種別') !!}
                    {!! Form::text('type', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('area', '原産地') !!}
                    {!! Form::text('area', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">    
                    {!! Form::label('alcohol_content', '度数') !!}
                    {!! Form::text('alcohol_content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('distillery', '蒸留所') !!}
                    {!! Form::text('distillery', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('memo', 'メモ') !!}
                    {!! Form::textarea('memo', null, ['class' => 'form-control']) !!}
                </div>
               
               <div class="form-group">
                    {!! Form::file('image',['class' => 'form-control-file']) !!}
               </div>
                

                {!! Form::submit('追加', ['class' => 'btn btn-outline-primary btn-block']) !!}

            {!! Form::close() !!}
        </div>
        
    </div>
@endsection