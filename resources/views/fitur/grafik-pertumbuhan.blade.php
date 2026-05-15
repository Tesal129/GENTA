<!-- Menggunakan CDN Tailwind dan Font Google -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen bg-[#01140d] p-4 lg:p-12 font-['Plus_Jakarta_Sans',sans-serif] text-slate-200">
    <!-- Dekorasi Background (Glow Effects) -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-emerald-600/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-600/10 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-7xl mx-auto space-y-10 relative z-10">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 bg-white/5 p-8 rounded-[2.5rem] border border-white/10 backdrop-blur-md">
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#01140d]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl font-extrabold text-white tracking-tight">Genta<span class="text-emerald-500">.</span></h1>
                </div>
                <p class="text-emerald-500/60 font-medium ml-1">Smart Health Monitoring & KMS Digital System</p>
            </div>
            
            <button class="group bg-[#00c897] hover:bg-white text-[#021a11] font-bold px-8 py-4 rounded-2xl flex items-center gap-3 transition-all duration-300 shadow-xl shadow-emerald-900/40 hover:-translate-y-1 active:scale-95">
                <div class="bg-[#021a11] group-hover:bg-emerald-500 p-1 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-500 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                Tambah Data Balita
            </button>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Card Berat Badan -->
            <div class="bg-gradient-to-br from-[#062b1e] to-[#021a11] rounded-[3rem] p-8 border border-white/5 shadow-2xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                </div>
                
                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-10">
                        <div>
                            <h3 class="text-white text-2xl font-bold">Analisis Berat</h3>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <p class="text-emerald-500/50 text-xs font-bold uppercase tracking-widest">Growth Metric BB/U</p>
                            </div>
                        </div>
                        <span class="bg-emerald-500/10 text-[#00c897] px-4 py-1.5 rounded-xl text-xs font-black border border-emerald-500/20">STATUS: NORMAL</span>
                    </div>

                    <div class="flex items-end justify-between gap-3 h-48 mb-4">
                        <div class="flex-1 bg-white/5 rounded-2xl h-[40%] hover:bg-emerald-500/20 transition-all duration-500"></div>
                        <div class="flex-1 bg-white/5 rounded-2xl h-[65%] hover:bg-emerald-500/20 transition-all duration-500"></div>
                        <div class="flex-1 bg-gradient-to-t from-emerald-600 to-emerald-400 rounded-2xl h-[90%] shadow-[0_0_30px_rgba(16,185,129,0.4)]"></div>
                        <div class="flex-1 bg-white/5 rounded-2xl h-[55%] hover:bg-emerald-500/20 transition-all duration-500"></div>
                        <div class="flex-1 bg-white/5 rounded-2xl h-[75%] hover:bg-emerald-500/20 transition-all duration-500"></div>
                        <div class="flex-1 bg-white/5 rounded-2xl h-[45%] hover:bg-emerald-500/20 transition-all duration-500"></div>
                    </div>
                </div>
            </div>

            <!-- Card Tinggi Badan -->
            <div class="bg-gradient-to-br from-[#062b1e] to-[#021a11] rounded-[3rem] p-8 border border-white/5 shadow-2xl relative overflow-hidden group">
                <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>

                <div class="relative z-10">
                    <div class="flex justify-between items-start mb-10">
                        <div>
                            <h3 class="text-white text-2xl font-bold">Tinggi Badan</h3>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                                <p class="text-blue-500/50 text-xs font-bold uppercase tracking-widest">Growth Metric TB/U</p>
                            </div>
                        </div>
                        <span class="bg-blue-500/10 text-blue-400 px-4 py-1.5 rounded-xl text-xs font-black border border-blue-500/20 uppercase tracking-wider">Optimal</span>
                    </div>
                    
                    <div class="h-48 w-full bg-black/20 rounded-[2rem] border border-white/5 flex items-center justify-center p-8 group-hover:border-blue-500/20 transition-all duration-500">
                        <svg class="w-full h-full text-blue-500/40" viewBox="0 0 100 30" preserveAspectRatio="none">
                            <path d="M0,25 C20,25 30,5 50,15 C70,25 80,5 100,5" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                            <circle cx="100" cy="5" r="4" fill="#60a5fa" class="animate-ping" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white/5 rounded-[3rem] border border-white/10 shadow-2xl overflow-hidden backdrop-blur-md">
            <div class="p-10 border-b border-white/5 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="text-white text-2xl font-bold tracking-tight">Database Balita</h3>
                    <p class="text-slate-400 text-sm mt-1">Kelola dan pantau riwayat pertumbuhan secara real-time.</p>
                </div>
                <div class="bg-black/40 px-6 py-3 rounded-2xl border border-white/5">
                    <span class="text-emerald-500 font-mono font-bold text-lg">120</span>
                    <span class="text-slate-500 text-xs uppercase font-bold tracking-widest ml-2">Total Subjek</span>
                </div>
            </div>
            
            <div class="overflow-x-auto px-4 pb-4">
                <table class="w-full text-left border-separate border-spacing-y-3">
                    <thead>
                        <tr class="text-slate-500">
                            <th class="px-8 py-4 text-[11px] font-black uppercase tracking-[0.2em]">Identitas NIK</th>
                            <th class="px-8 py-4 text-[11px] font-black uppercase tracking-[0.2em]">Nama Lengkap</th>
                            <th class="px-8 py-4 text-[11px] font-black uppercase tracking-[0.2em]">Tanggal Lahir</th>
                            <th class="px-8 py-4 text-[11px] font-black uppercase tracking-[0.2em]">Wali / Orang Tua</th>
                            <th class="px-8 py-4 text-[11px] font-black uppercase tracking-[0.2em] text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr class="group transition-all duration-300">
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 rounded-l-[2rem] border-y border-l border-white/5 transition-colors">
                                <span class="bg-emerald-500/10 text-emerald-400 px-4 py-2 rounded-xl text-xs font-mono font-bold">320102140523</span>
                            </td>
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 border-y border-white/5 transition-colors">
                                <p class="font-bold text-white group-hover:text-emerald-400 transition-colors">Ahmad Fauzan</p>
                                <p class="text-[10px] text-emerald-500/50 uppercase font-bold mt-1">Laki-laki</p>
                            </td>
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 border-y border-white/5 transition-colors">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-slate-300 text-sm">12 Mei 2023</span>
                                </div>
                            </td>
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 border-y border-white/5 transition-colors">
                                <span class="text-slate-400 text-sm">Siti Aminah</span>
                            </td>
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 rounded-r-[2rem] border-y border-r border-white/5 text-right transition-colors">
                                <button class="bg-white/5 hover:bg-emerald-500 text-emerald-400 hover:text-[#021a11] px-6 py-2.5 rounded-xl text-xs font-black transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/20 border border-white/10 hover:border-transparent">
                                    DETAIL
                                </button>
                            </td>
                        </tr>
                        
                        <!-- Row 2 (Duplicate for Visual) -->
                        <tr class="group transition-all duration-300">
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 rounded-l-[2rem] border-y border-l border-white/5 transition-colors">
                                <span class="bg-emerald-500/10 text-emerald-400 px-4 py-2 rounded-xl text-xs font-mono font-bold">320108220922</span>
                            </td>
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 border-y border-white/5 transition-colors">
                                <p class="font-bold text-white group-hover:text-emerald-400 transition-colors">Zaskia Putri</p>
                                <p class="text-[10px] text-emerald-500/50 uppercase font-bold mt-1">Perempuan</p>
                            </td>
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 border-y border-white/5 transition-colors">
                                <div class="flex items-center gap-2 text-slate-300 text-sm">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    05 Sep 2022
                                </div>
                            </td>
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 border-y border-white/5 transition-colors">
                                <span class="text-slate-400 text-sm">Bambang H.</span>
                            </td>
                            <td class="bg-white/5 group-hover:bg-white/10 px-8 py-6 rounded-r-[2rem] border-y border-r border-white/5 text-right transition-colors">
                                <button class="bg-white/5 hover:bg-emerald-500 text-emerald-400 hover:text-[#021a11] px-6 py-2.5 rounded-xl text-xs font-black transition-all duration-300 hover:shadow-lg hover:shadow-emerald-500/20 border border-white/10 hover:border-transparent">
                                    DETAIL
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>