<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}" >
    <div class="main-container">
         <div class="buttons inner">
            <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/mypage">マイページトップ</a>
        </div>
        <div class="create-container">
            <!-- 体重入力 -->
            <form method="POST" action="/mypage/weight/update/{{ $health->id }}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" id="weight" name="health[weight]" value="{{$health->weight}}" placeholder="体重を入力">
                </div>
                <!-- 送信ボタン -->
                <button type="submit" class="btn btn-primary">追加する</button>
            </form>
        </div>
    </div>
</x-app-layout>