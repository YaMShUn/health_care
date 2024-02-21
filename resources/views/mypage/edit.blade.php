<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}" >
    <div class="container">
        <div class="card-header">新しい食事の追加</div>
        <div>
            <a href="/mypage">マイページトップ</a>
        </div>
        <div class="card-body">
            <!-- 体重入力 -->
            <form method="POST" action="/mypage/weight/update/{{ $health->id }}">
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