@if (isset($microposts))
    <ul class="list-none">
        @foreach ($microposts as $micropost)
            <li class="flex items-center gap-x-2 mb-4">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <div class="avatar">
                    <div class="w-12 rounded">
                    </div>
                </div>
                <div>
                    <div>
                        {{ $micropost->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p><a class="link link-hover text-info" href="{{ route('users.show', $micropost->id) }}">View profile</a></p>
                    </div>
                </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p><a class="link link-hover text-info" href="{{ route('users.show', $micropost->id) }}">View profile</a></p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif