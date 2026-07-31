@extends('layouts.fitur')

@section('title', 'Grafik Pertumbuhan')
@section('icon', 'bi-graph-up')
@section('headline', 'Deteksi dini otomatis yang selalu disesuaikan dengan standar kesehatan WHO.')
@section('image', asset('images/fitur/grafik.png'))

@section('content')
<ul>
    <li>Berdasarkan parameter Z-Score WHO untuk akurasi tingkat tinggi.</li>
    <li>Orang tua bisa lihat langsung apakah anaknya tumbuh secara ideal sesuai kurva normal.</li>
    <li>Sistem akan memberikan peringatan dini jika kurva pertumbuhan anak menurun atau berada di batas kuning/merah.</li>
</ul>
@endsection
