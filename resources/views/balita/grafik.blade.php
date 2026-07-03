@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-1">Grafik Pertumbuhan — {{ $balita->nama }}</h4>
    <p class="text-muted mb-4">Riwayat berat & tinggi badan dari waktu ke waktu</p>

    <div class="card shadow-sm mb-4 p-3">
        <canvas id="chartBerat" height="90"></canvas>
    </div>

    <div class="card shadow-sm p-3">
        <canvas id="chartTinggi" height="90"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($labels) !!};
    const berat = {!! json_encode($berat) !!};
    const tinggi = {!! json_encode($tinggi) !!};

    new Chart(document.getElementById('chartBerat'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Berat Badan (kg)',
                data: berat,
                borderColor: '#1565C0',
                backgroundColor: 'rgba(21, 101, 192, 0.1)',
                tension: 0.3,
                fill: true,
                pointRadius: 4,
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    new Chart(document.getElementById('chartTinggi'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Tinggi Badan (cm)',
                data: tinggi,
                borderColor: '#0E9E72',
                backgroundColor: 'rgba(14, 158, 114, 0.1)',
                tension: 0.3,
                fill: true,
                pointRadius: 4,
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });
</script>
@endsection