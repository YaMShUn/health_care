<x-app-layout>
    
 <h1 class="title">編集画面</h1>
    <div class="main-container">
        <div class="create-container">
            <form action="/posts/{{ $post->id }}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
                <div class="form-group">
                    <label for="image_url">画像</label>
                    <input type="file" id="image_url" name="image" class="form-control-file" accept="image/*">
                </div>
                 <div class="post-image">
                        <img src="{{ $post->image_url }}">
                    </div>
                <input type="submit" value="保存">
            </form>
             <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="button" onclick="deletePost({{ $post->id }})">削除</button> 
            </form>
            <script>
                function deletePost(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </div>
    </div>
</x-app-layout>
