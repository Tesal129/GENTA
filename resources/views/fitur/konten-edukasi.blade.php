<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Ini yang penting supaya kodenya 'nyala' -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<!-- Section Edukasi - Emerald Health Edition -->
<div class="p-8 bg-slate-50 rounded-[3rem] border border-white shadow-xl">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-emerald-500 rounded-2xl shadow-lg shadow-emerald-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-black text-slate-800 tracking-tight">Edukasi Orang Tua</h2>
                <p class="text-emerald-600/70 font-bold text-sm uppercase tracking-widest">Wawasan Tumbuh Kembang</p>
            </div>
        </div>
        <button class="px-6 py-3 bg-white border-2 border-emerald-100 rounded-2xl text-sm font-bold text-emerald-600 hover:bg-emerald-500 hover:text-white transition-all shadow-sm active:scale-95">
            Lihat Semua Materi
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card Item 1: Nutrisi -->
        <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-emerald-50 shadow-sm hover:shadow-2xl hover:shadow-emerald-200/50 hover:-translate-y-2 transition-all duration-500">
            <!-- Thumbnail -->
            <div class="relative h-48 bg-emerald-100 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                    <span class="text-white text-xs font-bold flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        </svg>
                        Putar Video
                    </span>
                </div>
                <!-- Placeholder SVG -->
                <div class="w-full h-full bg-gradient-to-br from-emerald-50 to-emerald-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                <!-- Category Tag -->
                <div class="absolute top-4 left-4">
                    <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-emerald-600 shadow-sm border border-emerald-100">
                        Nutrisi
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <h5 class="text-lg font-extrabold text-slate-800 mb-2 group-hover:text-emerald-600 transition-colors">Pentingnya MPASI Bergizi</h5>
                <p class="text-sm text-slate-500 leading-relaxed mb-6">Panduan memberikan makanan pendamping ASI pertama yang kaya nutrisi...</p>
                
                <div class="flex items-center justify-between pt-4 border-t border-emerald-50">
                    <a href="#" class="flex items-center gap-2 text-emerald-600 font-black text-xs uppercase tracking-tighter hover:text-emerald-700 transition-colors">
                        Baca Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <span class="text-[10px] text-emerald-400 font-bold uppercase">5 Menit</span>
                </div>
            </div>
        </div>

        <!-- Card Item 2: Psikologi -->
        <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-emerald-50 shadow-sm hover:shadow-2xl hover:shadow-emerald-200/50 hover:-translate-y-2 transition-all duration-500">
            <div class="relative h-48 bg-emerald-50 flex items-center justify-center">
                 <span class="px-4 py-1.5 absolute top-4 left-4 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-emerald-600 shadow-sm border border-emerald-100">Psikologi</span>
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-emerald-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </div>
            <div class="p-6">
                <h5 class="text-lg font-extrabold text-slate-800 mb-2 group-hover:text-emerald-600 transition-colors">Bonding Ayah & Anak</h5>
                <p class="text-sm text-slate-500 leading-relaxed mb-6">Membangun ikatan emosional yang kuat antara ayah dan si kecil sejak dini.</p>
                <div class="flex items-center justify-between pt-4 border-t border-emerald-50">
                    <a href="#" class="flex items-center gap-2 text-emerald-600 font-black text-xs uppercase tracking-tighter hover:text-emerald-700 transition-colors">
                        Baca Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <span class="text-[10px] text-emerald-400 font-bold uppercase">3 Menit</span>
                </div>
            </div>
        </div>

    </div>
</div>