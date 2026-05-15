<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genta - Dashboard Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Menggunakan Font yang mirip dengan desain modern Genta --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #021a11; /* Background gelap khas Genta */
        }
        .genta-card {
            background-color: #062b1e; /* Warna hijau gelap kartu */
            border: 1px solid rgba(16, 185, 129, 0.1);
        }
        .genta-accent {
            color: #00c897; /* Hijau neon Genta */
        }
        .genta-btn {
            background-color: #00c897;
            color: #021a11;
        }
    </style>
</head>
<body class="min-h-screen p-6 md:p-12">

<div class="max-w-6xl mx-auto">
    
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-10">
        <div>
            <h2 class="text-3xl font-bold text-white tracking-tight">Daftar Data Balita</h2>
            <p class="text-emerald-500/60 text-sm mt-1">Manajemen data kesehatan dalam ekosistem Genta</p>
        </div>
        <button class="genta-btn hover:bg-emerald-400 font-bold px-6 py-3 rounded-xl flex items-center gap-2 transition-all shadow-lg shadow-emerald-900/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Data
        </button>
    </div>

    {{-- Main Table Card --}}
    <div class="genta-card rounded-[2rem] overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-emerald-900/50">
                        <th class="px-8 py-6 text-[11px] font-bold uppercase tracking-[0.2em] text-emerald-500/50">NIK</th>
                        <th class="px-8 py-6 text-[11px] font-bold uppercase tracking-[0.2em] text-emerald-500/50">Nama Lengkap</th>
                        <th class="px-8 py-6 text-[11px] font-bold uppercase tracking-[0.2em] text-emerald-500/50">Tgl Lahir</th>
                        <th class="px-8 py-6 text-[11px] font-bold uppercase tracking-[0.2em] text-emerald-500/50">Orang Tua</th>
                        <th class="px-8 py-6 text-[11px] font-bold uppercase tracking-[0.2em] text-emerald-500/50 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-emerald-900/30">
                    {{-- Row 1 --}}
                    <tr class="hover:bg-emerald-900/20 transition-colors group">
                        <td class="px-8 py-5">
                            <span class="bg-[#021a11] text-emerald-400 border border-emerald-800/50 px-3 py-1 rounded-lg text-xs font-mono">
                                3201xxx
                            </span>
                        </td>
                        <td class="px-8 py-5">
                            <span class="text-white font-semibold group-hover:genta-accent transition-colors">Ahmad Fauzan</span>
                        </td>
                        <td class="px-8 py-5 text-emerald-100/70 text-sm">
                            12 Mei 2023
                        </td>
                        <td class="px-8 py-5 text-emerald-100/70 text-sm">
                            Siti Aminah
                        </td>
                        <td class="px-8 py-5 text-right">
                            <button class="border border-emerald-500/30 text-emerald-400 hover:bg-emerald-500 hover:text-[#021a11] px-5 py-1.5 rounded-full text-xs font-bold transition-all">
                                Edit
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Footer Info --}}
        <div class="bg-[#042117] px-8 py-4 flex justify-between items-center border-t border-emerald-900/50">
            <span class="text-[10px] text-emerald-700 font-medium uppercase tracking-widest">Genta Health System v1.0</span>
            <div class="flex gap-4">
                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>