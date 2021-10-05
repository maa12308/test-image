@extends('layouts.app')

@section('content')
    
    <div class="container">
    <div class="row">
        
        <div class="col-md-6 col-sm-8">
            <div class="polaroids">
            <a href="{{ $item->image }}" data-lightbox="group"><img src="{{ $item->image }}"  class="img-fluid"></a>
            </div>
     @include('items_favorite.favorite_button')

             @if (Auth::id() == $item->user_id)
    
            <div class="text-center">
            {{-- 編集ページへのリンク --}}
            {!! link_to_route('items.edit', '編集', ['item' => $item->id], ['class' => 'btn btn-outline-secondary']) !!}
            {{-- 削除フォーム --}}
            {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-outline-secondary']) !!}
            {!! Form::close() !!}
            </div>
            
            
            
            @endif
            
        </div>
        
          <div class="col-md-6 col-sm-8">
             
            <ul class="list-group list-group-flush">
              <li class="list-group-item"></li>
              <li class="list-group-item font-weight-light text-secondary py-0">
                銘柄：{{ $item->bland }}
                
              </li>
              <li class="list-group-item font-weight-light text-secondary py-0">
                種別：{{ $item->type }}
                
              </li>
              <li class="list-group-item font-weight-light text-secondary py-0">
                原産地：{{ $item->area }}
                
              </li>
              <li class="list-group-item font-weight-light text-secondary py-0">
                度数：{{ $item->alcohol_content }}
                
              </li>
              <li class="list-group-item font-weight-light text-secondary py-0">
                蒸留所：{{ $item->distillery }}
                
              </li>
              <li class="list-group-item font-weight-light text-secondary py-0">
                メモ：{!! nl2br(e($item->memo)) !!}
                
              </li>
          </ul>
        
        </div>

        
    </div>
 </div>   
        
@endsection
