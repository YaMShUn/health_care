<x-app-layout>
       <link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}" >
    <div class="main-container">
        <div class="create-container">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
            <div class="card-header">体重記録</div>
            
            <div class="card-body">
                <!-- 体重入力 -->
                <form method="POST" action="/mypage/weight/store">
                    @csrf
    
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" id="weight" name="health[weight]" placeholder="体重を入力" required>
                    </div>
    
                    @if(session('error'))
                        <div>{{ session('error') }}</div>
                    @endif
                    <!-- 送信ボタン -->
                    <div class="btn-container">
                        <button type="submit" class="green-btn">追加する</button>
                    </div>
                </form>
            </div>
        </div>
         <div class="create-container">  
           <div class="card-header">食事記録</div>
                <form method="POST" action="/mypage/meal/store" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image_url">画像</label>
                        <input type="file" id="image_url" name="image" class="form-control-file" accept="image/*" required>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="green-btn">追加する</button>
                    </div>
                </form>
          </div>
         <div  class="buttons inner">
            <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/mypage">戻る</a>
        </div>
    </div>
</x-app-layout>
              
