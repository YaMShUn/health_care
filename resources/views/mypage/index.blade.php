<x-app-layout>
        <link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}" >
    <div class="main-container">
        <div class="weight-title">
            <h2>体重記録</h2>
        </div>
        <div class="weight-buttons flex">
            <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/mypage/create">新規投稿作成</a>
            <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="/mypage/weight/month">月単位</a>
        </div>
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
        <div class="weight-edit flex justify-between">
            @php
                $weight = [];
                $date = [];
            @endphp
            @foreach($healths as $health)
            @php
                $weight[] = $health->weight;
                $date[] = $health->created_at->toDateString();;
            @endphp
            <a href="/mypage/weight/edit/{{ $health->id }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                {{ $health->created_at->toDateString() }}  
            </a>
            @endforeach
        </div>
        <script>
            const weight = @json(array_reverse($weight));
            const date = @json(array_reverse($date));
            console.log(weight);
            console.log(date);
        </script>
        <div class="meal-title">
            <h2>食事記録</h2>
        </div>
        <div class="meal-container">
            
            @foreach($meals as $meal)
            <div class="meal-img">
                <img src="{{$meal->image_url}}"/>
            </div>
            @endforeach
        </div>
    </div>
    
</x-app-layout>