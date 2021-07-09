@extends('layouts.app')

@section('content')

    <h1>一覧</h1>

    @if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->bland }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->area }}</td>
                    <td>{{ $item->alcohol_content }}</td>
                    <td>{{ $item->distillery }}</td>
                    <td>{{ $item->memo }}</td>
                </tr>
                <tr>
                    {{-- 詳細ページへのリンク --}}
                    <td>{!! link_to_route('items.show', $item->id, ['item' => $item->id]) !!}</td>
                    <td>{{ $item->bland }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->area }}</td>
                    <td>{{ $item->alcohol_content }}</td>
                    <td>{{ $item->distillery }}</td>
                    <td>{{ $item->memo }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {!! link_to_route('items.create', '追加', [], ['class' => 'btn btn-primary']) !!}

@endsection