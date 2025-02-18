<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () { // Ini mendefinisikan perintah Artisan kustom yang bernama inspire.                                           Ketika kamu menjalankan php artisan inspire dari terminal, kode di dalam closure (fungsi) ini akan dijalankan.
    $this->comment(Inspiring::quote());//mengacu pada penggunaan class Inspiring untuk mendapatkan kutipan                                               inspiratif yang kemudian ditampilkan di terminal menggunakan metode comment dalam Artisan command di Laravel.
})->purpose('Display an inspiring quote')->hourly();
//Ini memberikan deskripsi atau tujuan dari task yang dijadwalkan. 
//->hourly():Ini adalah penjadwalan task untuk dijalankan setiap jam
