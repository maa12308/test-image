@extends('layouts.app')

@section('content')

<div class="name text-center">
            <h1>お気に入り一覧</h1>
        </div>
    <div class="row">
       
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- 投稿一覧 --}}
            @include('items.items')
        </div>
    </div>
@endsection