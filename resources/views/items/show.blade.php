@extends('layouts.app')

@section('content')

    <h1>id = {{ $item->id }} のメッセージ詳細ページ</h1>

    <div class="row">
         <div class="col-6">
        <div>
            <li>id</li>
            <li>{{ $item->id }}</li>
        </div>
        <div>
            <li>bland</li>
            <li>{{ $item->bland }}</li>
        </div>
        <div>
            <li>id</li>
            <li>{{ $item->type }}</li>
        </div>
        <div>
            <li>id</li>
            <li>{{ $item->area }}</li>
        </div>
        <div>
            <li>id</li>
            <li>{{ $item->alcohol_content }}</li>
        </div>
        <div>
            <li>id</li>
            <li>{{ $item->distillery }}</li>
        </div>
        <div>
            <li>id</li>
            <li>{{ $item->memo }}</li>
        </div>
    </div>
    </div>
    
    {{-- 編集ページへのリンク --}}
    {!! link_to_route('items.edit', '編集', ['item' => $item->id], ['class' => 'btn btn-light']) !!}

    {{-- 削除フォーム --}}
    {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    
@endsection
