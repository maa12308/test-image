@extends('layouts.app')

@section('content')
    @if (Auth::check())
       
        @include('items.index')
  
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>test</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection