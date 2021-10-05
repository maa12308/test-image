<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ユーザ詳細タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            投稿
            <span class="badge badge-secondary">{{ $user->items_count }}</span>
        </a>
    </li>
    {{-- お気に入り一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
            Favorites
            <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
        </a>
    </li>

</ul>