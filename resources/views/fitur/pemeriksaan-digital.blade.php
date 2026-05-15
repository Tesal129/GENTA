<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Ini yang penting supaya kodenya 'nyala' -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<!-- Container Form Pemeriksaan - Modern Pro Edition -->
<div class="max-w-2xl mx-auto bg-white/80 backdrop-blur-xl rounded-[2.5rem] border border-slate-200 shadow-[0_20px_50px_rgba(0,0,0,0.05)] overflow-hidden">
    
    <!-- Header dengan Gradien Halus -->
    <div class="p-8 bg-gradient-to-r from-emerald-50 via-teal-50 to-transparent border-b border-slate-100 flex items-center gap-4">
        <div class="p-3 bg-emerald-500 rounded-2xl shadow-lg shadow-emerald-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tight">Input Pemeriksaan</h2>
            <p class="text-sm text-slate-500 font-medium italic">Catat perkembangan bulanan si kecil</p>
        </div>
    </div>

    <form action="#" method="POST" class="p-8 space-y-6">
        <!-- Field Pilih Balita -->
        <div class="space-y-2">
            <label class="flex items-center gap-2 text-xs font-black uppercase tracking-widest text-slate-400 ml-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Pilih Balita
            </label>
            <div class="relative group">
                <select class="appearance-none block w-full bg-slate-50 border-2 border-slate-100 text-slate-700 font-bold py-4 px-5 rounded-2xl leading-tight focus:outline-none focus:bg-white focus:border-emerald-500 transition-all cursor-pointer">
                    <option disabled selected>Cari Nama Balita...</option>
                    <option>Andi Wijaya</option>
                    <option>Siti Aminah</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400 group-focus-within:text-emerald-500 transition-colors">
                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Grid Input Berat & Tinggi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Berat Badan -->
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Berat Badan (kg)</label>
                <div class="relative">
                    <input type="number" step="0.1" placeholder="0.0" class="block w-full bg-slate-50 border-2 border-slate-100 text-slate-700 font-extrabold py-4 px-5 rounded-2xl focus:outline-none focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all placeholder:text-slate-300">
                    <div class="absolute inset-y-0 right-5 flex items-center">
                        <span class="text-xs font-black text-slate-400 bg-slate-200/50 px-2 py-1 rounded-lg">KG</span>
                    </div>
                </div>
            </div>
            
            <!-- Tinggi Badan -->
            <div class="space-y-2">
                <label class="text-xs font-black uppercase tracking-widest text-slate-400 ml-1">Tinggi Badan (cm)</label>
                <div class="relative">
                    <input type="number" step="0.1" placeholder="0.0" class="block w-full bg-slate-50 border-2 border-slate-100 text-slate-700 font-extrabold py-4 px-5 rounded-2xl focus:outline-none focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all placeholder:text-slate-300">
                    <div class="absolute inset-y-0 right-5 flex items-center">
                        <span class="text-xs font-black text-slate-400 bg-slate-200/50 px-2 py-1 rounded-lg">CM</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button Simpan -->
        <div class="pt-4">
            <button type="submit" class="group relative w-full flex justify-center items-center gap-3 bg-emerald-600 hover:bg-emerald-500 text-white py-5 px-6 rounded-2xl font-black text-lg tracking-wide shadow-xl shadow-emerald-200 active:scale-[0.98] transition-all duration-200 overflow-hidden">
                <span class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                SIMPAN HASIL PEMERIKSAAN
            </button>
        </div>
    </form>
    
    <!-- Footer info -->
    <div class="p-6 bg-slate-50 text-center border-t border-slate-100">
        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest leading-none italic">Pastikan data yang dimasukkan sudah benar sesuai KMS</p>
    </div>
</div>
