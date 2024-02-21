<x-app-layout>
     <!--CSS読み込み-->
    <div class="main-container">

        <link rel="stylesheet" href="{{ asset('/css/post.css')  }}" >
        <div  class="buttons inner">
            <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/posts">戻る</a>
        </div>
        
        <div class="create-container">
            <div class="create-header"><h2>新しい投稿</h2></div>
            <form method="POST" action="/posts/store" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <textarea id="body" name="post[body]" class="form-control" rows="4" required></textarea>
                </div>
                <div class="create-image">
                    <label for="image_url">画像</label>
                    <input type="file" id="image_url" name="image" class="form-control-file" accept="image/*">
                </div>
                <div class="submit-btn">
                    <button type="submit" class="btn btn-primary bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">投稿する</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>