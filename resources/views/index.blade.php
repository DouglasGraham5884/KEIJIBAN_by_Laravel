<x-layout>
    <x-slot:title>TOP | KEIJI BAN</x-slot>

    <h1>簡易掲示板</h1>
    <div class="submit-container">
        
        <form action="{{ route('posts.store') }}" class="submit-form" id="submit-form" method="post">
            @csrf
            
            <input class="submit-name" type="text" name="name" placeholder="名前を入力してください（省略可）" value="{{ old('name') }}">
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
            <textarea class="submit-message" name="message" placeholder="メッセージを入力してください（必須）">{{ old('message') }}</textarea>
            @error('message')
            <p class="error">{{ $message }}</p>
            @enderror
            <button class="submit-button">送信</button>
        </form>
    </div>
    <main>
        @forelse($posts as $post)
        <div class="message-container">
            <p class="message-header">
                <small class="id">{{ $post -> id }}</small>
                <small class="name">{{ $post -> name }}</small>
                <small class="date">{{ ($post -> updated_at) }}</small>
                <small class="edit"><a class="edit-link" href="{{ route('posts.edit', $post) }}">編集</a></small>
            </p>
            <p class="message">
                {!! nl2br(e($post -> message)) !!}
            </p>
            <p>
                <form id="delete-form" method="post" action="{{ route('posts.destroy', $post) }}">
                    @method('DELETE')
                    @csrf

                    <button class="delete-button">削除</button>
                </form>
            </p>
        </div>
        @empty
        <p>No message.<br>メッセージがまだありません。</p>
        @endforelse
    </main>

    <script type="text/javascript">
        const deleteForm = document.getElementById('delete-form');
        deleteForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if(confirm('Sure?\n投稿を削除しますか？') === false) {
                return;
            }
            deleteForm.submit();
        });
    </script>
</x-layout>