<x-app-layout>
       <link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}" >
    <div class="main-container">
        <div class="create-container">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
            <div class="card-header">新しい食事の追加</div>
            <div>
                <a href="/mypage">マイページトップ</a>
            </div>
            <div class="card-body">
                <!-- 体重入力 -->
                <form method="POST" action="/mypage/weight/store">
                    @csrf
    
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" id="weight" name="health[weight]" placeholder="体重を入力">
                    </div>
    
                    @if(session('error'))
                        <div>{{ session('error') }}</div>
                    @endif
                    <!-- 送信ボタン -->
                    <button type="submit" class="btn btn-primary">追加する</button>
                </form>
                
                 食事記録 
                <form method="POST" action="/mypage/meal/store" enctype="multipart/form-data">
                    @csrf
    
                    <div class="form-group">
                        <label for="image_url">画像</label>
                        <input type="file" id="image_url" name="image" class="form-control-file" accept="image/*">
                    </div>
    
    
                     送信ボタン 
                    <button type="submit" class="btn btn-primary">追加する</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
              
