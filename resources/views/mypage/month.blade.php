<x-app-layout>
        <link rel="stylesheet" href="{{ asset('/css/mypage.css')  }}" >
    <div class="main-container">
        <div class="weight-title">
            <h2>体重記録[月単位]</h2>
        </div>
        <div class="chart">
            <canvas id="monthChart"></canvas>
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
            @endforeach
        </div>
        <script>
            const weight = @json($weight);
            const date = @json($date);
            console.log(weight);
            console.log(date);
        </script>
    </div>
    
</x-app-layout>