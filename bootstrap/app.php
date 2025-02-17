<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
//Ini mengindikasikan bahwa Application adalah sebuah kelas dengan metode configure() yang dipanggil secara statis.
//Tujuan dari metode configure() kemungkinan untuk menginisialisasi atau mengatur konfigurasi aplikasi. Ini bisa                                       melibatkan pengaturan jalur file, variabel lingkungan, atau konfigurasi lainnya.
//basePath kemungkinan adalah sebuah opsi konfigurasi yang memberitahu aplikasi di mana direktori dasar (root) aplikasi berada.
//dirname(__DIR__) memberikan direktori induk dari direktori file saat ini.
    ->withRouting(//->withRouting() biasanya digunakan untuk mengonfigurasi atau menghubungkan                                                          routing dengan objek atau aplikasi yang sedang dibangun. 
        web: __DIR__.'/../routes/web.php',//Biasanya digunakan dalam konteks pengaturan routing pada                                                          aplikasi berbasis PHP (seperti Laravel atau aplikasi kustom)
        commands: __DIR__.'/../routes/console.php',//commands: Ini mungkin merujuk pada pengaturan yang                                              berhubungan dengan perintah (commands) yang dijalankan oleh aplikasi atau framework.
        //commands: Ini mungkin merujuk pada pengaturan yang berhubungan dengan perintah (commands) yang dijalankan oleh aplikasi atau framework.
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //Ini tampaknya bagian dari konfigurasi untuk menambahkan middleware dalam aplikasi berbasis PHP.
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //Ini menunjukkan bahwa aplikasi atau sistem ini menggunakan mekanisme untuk menangani pengecualian (exceptions
    })->create();
