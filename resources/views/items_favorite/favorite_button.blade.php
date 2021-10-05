<div class="favorite">
 @if (Auth::user()->is_favorite($item->id))
    {{-- お気に入り削除ボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.unfavorite', $item->id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-heart text-danger"></i> Unfavorite', ['class' => "btn btn-outline-info", 'type' => 'submit']) !!}
    {!! Form::close() !!}
@else
    {{-- お気に入りボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.favorite', $item->id]]) !!}
    {!! Form::button('<i class="fas fa-heart text-danger"></i> favorite', ['class' => "btn btn-outline-info", 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endif
</div>
