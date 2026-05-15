<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Ini yang penting supaya kodenya 'nyala' -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="min-h-screen bg-slate-50 p-4 md:p-8">
    <div class="max-w-6xl mx-auto space-y-8">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-black text-slate-800 tracking-tight">Laporan Statistik</h1>
                <p class="text-emerald-600 font-bold uppercase text-xs tracking-[0.2em]">Data Ringkasan Posyandu • Mei 2026</p>
            </div>
            <div class="flex gap-3">
                <button class="flex items-center gap-2 px-5 py-2.5 bg-white border-2 border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:border-emerald-500 hover:text-emerald-600 transition-all shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Cetak PDF
                </button>
                <button class="flex items-center gap-2 px-5 py-2.5 bg-emerald-500 rounded-xl text-sm font-bold text-white hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-200">
                    Filter Periode
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-[2rem] border border-emerald-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Balita</p>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-black text-slate-800">128</span>
                    <span class="text-emerald-500 text-xs font-bold mb-1">+4 bln ini</span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-emerald-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Sudah Periksa</p>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-black text-slate-800">92</span>
                    <span class="text-slate-400 text-xs font-bold mb-1">/ 128 anak</span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-emerald-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Kondisi Sehat</p>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-black text-emerald-500">84%</span>
                    <div class="w-12 h-1.5 bg-emerald-100 rounded-full mb-2 overflow-hidden">
                        <div class="bg-emerald-500 h-full w-[84%]"></div>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-emerald-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Status Stunting</p>
                <div class="flex items-end gap-2">
                    <span class="text-3xl font-black text-amber-500">2</span>
                    <span class="text-slate-400 text-xs font-bold mb-1">Kasus Baru</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-black text-slate-800 tracking-tight">Tren Pertumbuhan Berat Badan</h3>
                    <select class="text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-lg outline-none">
                        <option>6 Bulan Terakhir</option>
                    </select>
                </div>
                <div class="h-[300px] w-full">
                    <canvas id="growthChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm">
                <h3 class="font-black text-slate-800 tracking-tight mb-6">Aktivitas Terakhir</h3>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="w-2 h-2 mt-2 rounded-full bg-emerald-500 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></div>
                        <div>
                            <p class="text-sm font-bold text-slate-700">Pemeriksaan Selesai</p>
                            <p class="text-xs text-slate-400">Balita: Andi Wijaya • 10:45 WIB</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-2 h-2 mt-2 rounded-full bg-emerald-500 opacity-50"></div>
                        <div>
                            <p class="text-sm font-bold text-slate-700">Input Data Balita Baru</p>
                            <p class="text-xs text-slate-400">Siti Aminah • 09:12 WIB</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-2 h-2 mt-2 rounded-full bg-amber-400 shadow-[0_0_8px_rgba(251,191,36,0.5)]"></div>
                        <div>
                            <p class="text-sm font-bold text-slate-700">Jadwal Imunisasi Esok</p>
                            <p class="text-xs text-slate-400">12 Balita Terdaftar</p>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-8 py-3 rounded-2xl bg-slate-50 text-slate-500 font-bold text-xs uppercase tracking-widest hover:bg-emerald-50 hover:text-emerald-600 transition-all">Lihat Log Aktivitas</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('growthChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Rata-rata Berat (kg)',
                data: [8.2, 8.5, 8.9, 9.4, 9.8, 10.2],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                fill: true,
                tension: 0.4,
                borderWidth: 4,
                pointRadius: 0,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { display: false },
                x: { grid: { display: false }, ticks: { font: { weight: 'bold' }, color: '#94a3b8' } }
            }
        }
    });
</script>