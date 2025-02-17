<?php

use Illuminate\Database\Migrations\Migration;//Ini adalah bagian dari Laravel (framework PHP) yang digunakan untuk migrasi database
use Illuminate\Database\Schema\Blueprint;//Ini digunakan untuk mengimpor kelas Blueprint dari namespace Illuminate\Database\Schema di Laravel. 
use Illuminate\Support\Facades\Schema;//Ini digunakan untuk mengimpor Schema dari Illuminate\Support\Facades di Laravel. Schema adalah kelas yang sangat penting dalam Laravel untuk mengelola struktur database melalui migrasi

return new class extends Migration //Ini adalah contoh penggunaan anonymous class atau kelas anonim di PHP, yang di Laravel                               digunakan dalam konteks migrasi database.
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_lists');
    }
};