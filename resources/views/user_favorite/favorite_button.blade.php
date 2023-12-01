@if (Auth::id() != $micropost->id)
    @if (Auth::user()->is_favorites($micropost->id))
        {{-- UnFavoriteボタンのフォーム --}}
        <form method="POST" action="{{ route('favorites.unfavorite', $micropost->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error btn-block normal-case">Unfavorite</button>
        </form>
    @else
        {{-- Favoriteボタンのフォーム --}}
        <form method="POST" action="{{ route('favorites.favorite', $micropost->id) }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-block normal-case">Favorite</button>
        </form>
    @endif
@endif