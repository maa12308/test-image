@extends('layouts.app')

@section('content')

    <h1>新規ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($item, ['route' => 'items.store']) !!}

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

                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection