@extends('layouts.app')

@section('title','ダッシュボード')

@section('content')
<div class="dashboard-container mx-auto my-6 bg-white p-6 rounded shadow-lg">
    <h1 class="dashboard-title">ダッシュボード（日別収穫量 & 収穫率）</h1>

    <!-- 作付けを選択するフォーム -->
    <form action="{{ route('data.index') }}" method="GET" class="dashboard-form">
        <label for="cropping_id" class="dashboard-label mr-4 text-lg font-semibold text-gray-700">作付けを選択:</label>
        <select name="cropping_id" id="cropping_id" class="dashboard-select border border-gray-300 p-2 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">-- 選択してください --</option>
            @foreach($croppings as $crop)
                <option value="{{ $crop->id }}"
                    {{ $selectedCroppingId == $crop->id ? 'selected' : '' }}>
                    {{ $crop->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="dashboard-button ml-4 px-6 py-2 bg-blue-500 text-white rounded shadow hover:bg-blue-600 transition duration-200">
            表示
        </button>
    </form>

    <div class="chart-container">
        <canvas id="harvestChart" width="400" height="200" class="dashboard-chart"></canvas>
    </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('harvestChart').getContext('2d');

    // Blade から配列を受け取る
    const labels        = @json($chartLabels);
    const dataQuantity  = @json($chartDataQuantity);
    const dataRate      = @json($chartDataRate);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: '日別収穫量(kg)',
                    data: dataQuantity,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    yAxisID: 'yQuantity',
                    type: 'bar'
                },
                {
                    label: '累計収穫率(%)',
                    data: dataRate,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    yAxisID: 'yRate',
                    type: 'line',
                    fill: false,
                    tension: 0.2
                },
            ]
        },
        options: {
            responsive: true,
            scales: {
                yQuantity: {
                    type: 'linear',
                    position: 'left',
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: '日別収穫量 (kg)'
                    }
                },
                yRate: {
                    type: 'linear',
                    position: 'right',
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: '累計収穫率 (%)'
                    },
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });
});
</script>
@endsection

<style>
    .dashboard-container {
        background-color: #f9fafb;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .dashboard-title {
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        color: #2d3748;
        text-transform: uppercase;
        letter-spacing: 0.1rem;
    }
    
    .dashboard-form {
        display: flex;
        align-items: center;
        float:right;
        margin-top:20px;
        margin-bottom:50px;
    }
    
    .dashboard-label {
        color: #4a5568;
    }
    
    .dashboard-select {
        border-radius: 4px;
        border: 1px solid #cbd5e0;
        padding: 0.5rem;
        width: 200px;
        font-size: 1rem;
    }
    
    .dashboard-button {
        background-color: #3182ce;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.2s ease-in-out;
    }
    
    .dashboard-button:hover {
        background-color: #2b6cb0;
    }
    
    .chart-container {
        margin-top: 2rem;
        padding: 1rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .dashboard-chart {
        max-width: 100%;
        height: auto;
    }
</style>
    