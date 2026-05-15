<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Ini yang penting supaya kodenya 'nyala' -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 p-10 flex justify-center items-center min-h-screen">
<div class="max-w-md mx-auto bg-slate-900/40 backdrop-blur-xl rounded-[3rem] border border-white/10 shadow-[0_20px_50px_rgba(0,0,0,0.3)] overflow-hidden">
    <div class="p-8 border-b border-white/5 flex items-center justify-between bg-white/5">
        <div class="flex items-center gap-4">
            <div class="relative">
                <div class="absolute inset-0 bg-emerald-500 blur-lg opacity-40 animate-pulse"></div>
                <div class="relative p-3 bg-emerald-500/20 rounded-2xl border border-emerald-500/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            <div>
                <h2 class="text-xl font-extrabold text-white tracking-tight">Jadwal Pengingat</h2>
                <p class="text-[10px] text-slate-400 uppercase tracking-[0.2em] font-medium">Kesehatan Buah Hati</p>
            </div>
        </div>
        <button class="group flex items-center gap-1 text-emerald-400 text-[10px] font-black uppercase tracking-widest hover:text-white transition-all">
            Kalender 
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <div class="p-6 space-y-4">
        <div class="group relative flex items-center p-5 rounded-[2rem] bg-gradient-to-br from-amber-500/[0.15] to-transparent border border-amber-500/20 hover:border-amber-500/50 hover:translate-x-2 transition-all duration-500 cursor-pointer overflow-hidden">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-500/5 rounded-full blur-2xl group-hover:bg-amber-500/10 transition-colors"></div>
            
            <div class="relative flex-shrink-0 w-14 h-14 bg-amber-500/20 rounded-[1.2rem] flex items-center justify-center mr-4 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-amber-500 drop-shadow-[0_0_8px_rgba(245,158,11,0.5)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            
            <div class="flex-1 relative">
                <p class="text-white font-bold text-lg leading-tight tracking-wide">Imunisasi Campak</p>
                <div class="flex items-center gap-2 mt-1.5">
                    <div class="p-1 bg-white/5 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-amber-500/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-[11px] text-slate-300 font-semibold uppercase tracking-wider">20 Mei 2026</p>
                </div>
            </div>

            <div class="relative flex flex-col items-end gap-1.5">
                <span class="px-3 py-1 bg-amber-500 text-slate-900 rounded-full text-[9px] font-black uppercase tracking-tighter shadow-[0_0_15px_rgba(245,158,11,0.3)]">
                    Mendatang
                </span>
                <div class="flex items-center gap-1">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                    </span>
                    <p class="text-[10px] text-amber-500/80 font-bold italic tracking-tight">5 Hari Lagi</p>
                </div>
            </div>
        </div>

        <div class="group flex items-center p-5 rounded-[2rem] bg-white/[0.03] border border-white/5 hover:border-emerald-500/30 hover:bg-emerald-500/[0.05] transition-all duration-500 opacity-60 hover:opacity-100 cursor-default">
            <div class="flex-shrink-0 w-14 h-14 bg-slate-800/50 rounded-[1.2rem] flex items-center justify-center mr-4 border border-white/5 group-hover:border-emerald-500/20 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-emerald-500/40 group-hover:text-emerald-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            
            <div class="flex-1">
                <p class="text-slate-400 font-bold text-lg leading-tight line-through decoration-emerald-500/30 group-hover:text-white/80 transition-colors">Vitamin A</p>
                <div class="flex items-center gap-2 mt-1.5">
                    <p class="text-[11px] text-slate-500 font-medium">Selesai pada 01 Mei</p>
                </div>
            </div>

            <span class="px-3 py-1 bg-emerald-500/10 text-emerald-500/50 group-hover:text-emerald-400 border border-emerald-500/10 rounded-full text-[9px] font-black uppercase tracking-widest transition-colors">
                Verified
            </span>
        </div>
    </div>
    
    <div class="pb-6 text-center">
        <p class="text-[9px] text-slate-500 font-bold uppercase tracking-[0.3em]">Smart Health Reminder v2.0</p>
    </div>
</div>
</body>
</html>