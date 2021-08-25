@extends('layouts.app')

@section('content')

    <div class="user-profile">
        <div class="icon text-center">
            <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 170]) }}" alt="">
                </div>
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="status text-center">
            <div class="status-label">投稿数</div>
            <div id="items_count" class="status-value">
                {{ $user->items_count }}
            </div>
        </div>
    </div>
    @include('items.items')
             
            
@endsection