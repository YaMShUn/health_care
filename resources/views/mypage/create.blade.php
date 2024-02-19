<x-app-layout>
    <div class="container">
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


            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Example Page</title>
                <!-- 外部のCSSファイルを読み込む -->
                <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
            </head>
            <body>
                <div class="container">
                    <h1>Example Page</h1>
                    <p>This is an example page with external CSS styling.</p>
                </div>
            </body>
            </html>
            
                </div>
            </x-app-layout>
              
