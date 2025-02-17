<?php

use Illuminate\Database\Migrations\Migration;//Ini adalah bagian dari Laravel (framework PHP) yang digunakan untuk migrasi database
use Illuminate\Database\Schema\Blueprint;//Ini digunakan untuk mengimpor kelas Blueprint dari namespace Illuminate\Database\Schema di Laravel. 
use Illuminate\Support\Facades\Schema;//Ini digunakan untuk mengimpor Schema dari Illuminate\Support\Facades di Laravel. Schema adalah kelas yang sangat penting dalam Laravel untuk mengelola struktur database melalui migrasi

return new class extends Migration //Ini adalah contoh penggunaan anonymous class atau kelas anonim di PHP, yang di Laravel                               digunakan dalam konteks migrasi database.
{
    /**
     * Run the migrations.
     */
    public function up(): void //Ini adalah deklarasi metode up() yang digunakan dalam migrasi di Laravel
    {
        Schema::create('task_lists', function (Blueprint $table) {//Adalah bagian dari migrasi di Laravel yang                                        digunakan untuk membuat tabel baru di database
            $table->id();//digunakan untuk menambahkan kolom ID ke dalam tabel yang sedang dibuat. 
            $table->string('name')->unique();//digunakan untuk menambahkan kolom bernama name dengan tipe                                                  string ke dalam tabel, dan memastikan bahwa nilai dalam kolom name adalah unik.
            $table->timestamps();//Digunakan dalam migrasi Laravel untuk menambahkan dua kolom waktu ke dalam tabel                                        yang sedang dibuat, yaitu created_at dan updated_at.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //digunakan untuk membalikkan atau membatalkan perubahan yang dilakukan oleh migrasi up()
    {
        Schema::dropIfExists('task_lists');//Schema::dropIfExists() adalah sebuah metode yang digunakan untuk                                         menghapus sebuah tabel dari database, hanya jika tabel tersebut ada.
        //Dalam hal ini, task_lists adalah nama tabel yang akan dihapus.
    }
};