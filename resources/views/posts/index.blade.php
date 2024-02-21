<x-app-layout>
    <!--CSS読み込み-->
       <link rel="stylesheet" href="{{ asset('/css/post.css')  }}" >
    <div class="main-container">
        <div class="post-list">
            <h2>投稿一覧</h2>
        </div>
        <!--作成ボタンなど-->
        <div class="buttons inner">
            <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/posts/create">新規投稿作成</a>
        </div>
        <!--投稿一覧-->
        <div class="posts-container">
            @foreach($posts as $post)
            <div class="post">
                <div class="poster">
                    <p>投稿者名</p>
                </div>
                <div class="post-content">
                    <p>{{ $post->body }}</p>
                </div>
                <div class="post-image">
                    <img src="{{ $post->image_url }}">
                </div>
                <div class="post-time">
                    <p>{{ $post->updated_at}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>