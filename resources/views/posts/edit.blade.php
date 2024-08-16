<x-layout>
    <x-slot:title>EDIT | KEIJI BAN</x-slot>

    <h1>編集</h1>
    <div class="submit-container">
        
        <form action="{{ route('posts.update', $post) }}" class="submit-form" id="submit-form" method="post">
            @method('PATCH')
            @csrf
            
            <input class="submit-name" type="text" name="name" placeholder="名前を入力してください（省略可）" value="{{ old('name', $post -> name) }}">
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
            <textarea class="submit-message" name="message" placeholder="メッセージを入力してください（必須）">{{ old('message', $post -> message) }}</textarea>
            @error('message')
            <p class="error">{{ $message }}</p>
            @enderror
            <button class="submit-button">更新</button>
        </form>
    </div>
    <p class="back">
        <a href="{{ route('posts.index') }}" class="back-link">TOP</a>
    </p>
</x-layout>